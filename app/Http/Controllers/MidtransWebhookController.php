<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Log;

class MidtransWebhookController extends Controller
{
    public function handle(Request $request)
    {
        // Log incoming webhook untuk debugging
        Log::info('Midtrans Webhook Received', $request->all());

        // Ambil data dari webhook
        $orderId = $request->order_id;
        $statusCode = $request->status_code;
        $grossAmount = $request->gross_amount;
        $transactionStatus = $request->transaction_status;
        $signatureKey = $request->signature_key;
        $serverKey = config('midtrans.server_key');

        // Verifikasi signature
        $mySignatureKey = hash('sha512', $orderId . $statusCode . $grossAmount . $serverKey);

        if ($mySignatureKey !== $signatureKey) {
            Log::error('Invalid signature key', [
                'received' => $signatureKey,
                'expected' => $mySignatureKey
            ]);
            return response()->json(['status' => 'error', 'message' => 'Invalid signature'], 403);
        }

        // Cari order di database
        $order = Order::where('code_order', $orderId)->first();

        if (!$order) {
            Log::error('Order not found', ['order_id' => $orderId]);
            return response()->json(['status' => 'error', 'message' => 'Order not found'], 404);
        }

        // Update status berdasarkan transaction status
        switch ($transactionStatus) {
            case 'settlement':
            case 'capture':
                $order->update([
                    'payment_status' => 'paid'
                ]);
                Log::info('Order status updated to paid', ['order_id' => $orderId]);
                break;

            case 'pending':
                $order->update([
                    'payment_status' => 'pending'
                ]);
                Log::info('Order status updated to pending', ['order_id' => $orderId]);
                break;

            case 'cancel':
            case 'deny':
            case 'expire':
                $order->update([
                    'payment_status' => 'failed'
                ]);
                Log::info('Order status updated to failed', ['order_id' => $orderId]);
                break;

            default:
                Log::warning('Unhandled transaction status', [
                    'order_id' => $orderId,
                    'status' => $transactionStatus
                ]);
                break;
        }

        return response()->json(['status' => 'success']);
    }
}