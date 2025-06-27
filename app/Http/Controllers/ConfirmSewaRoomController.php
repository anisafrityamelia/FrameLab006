<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukRoom;
use App\Models\Order;
use Illuminate\Support\Str;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Transaction;

class ConfirmSewaRoomController extends Controller
{
    public function __construct()
    {
        // Set konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
    }

    public function index(Request $request)
    {
        $room = ProdukRoom::findOrFail($request->room_id);
        $order_date = $request->order_date;
        $order_times = $request->order_time; // array
        $total_order = count($order_times) * $room->price;
        $code_order = 'ORD-' . strtoupper(Str::random(8));
        
        return view('pages.confirm_sewa_room', [
            'room' => $room,
            'order_date' => $order_date,
            'order_times' => $order_times,
            'total_order' => $total_order,
            'code_order' => $code_order,
        ]);
    }

    public function generateQris(Request $request)
    {
        try {
            $user = session('logged_in_user');
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'anda harus login terlebih dahulu'
                ]);
            }
            $room = ProdukRoom::findOrFail($request->room_id);
            $order_times = json_decode($request->order_times, true);
            $total_order = count($order_times) * $room->price;

            // Generate code_order baru setiap kali untuk menghindari duplicate
            $code_order = 'ORD-' . strtoupper(Str::random(8)) . '-' . time();
            
            // Cek apakah order dengan code_order ini sudah ada (double check)
            $existingOrder = Order::where('code_order', $code_order)->first();
            if ($existingOrder) {
                // Jika masih ada yang sama, generate lagi
                $code_order = 'ORD-' . strtoupper(Str::random(10)) . '-' . time() . '-' . rand(100, 999);
            }


            // Simpan order ke database DENGAN customer_name dan customer_email
            $order = Order::create([
                'code_order' => $code_order,
                'room_id' => $room->id,
                'order_date' => $request->order_date,
                'order_times' => $order_times,
                'total_amount' => $total_order,
                'payment_status' => 'pending',
                'customer_name' => $user->username,    // TAMBAHAN INI
                'customer_email' => $user->email   // TAMBAHAN INI
            ]);

            // Parameter untuk Midtrans
            $params = [
                'transaction_details' => [
                    'order_id' => $code_order,
                    'gross_amount' => $total_order,
                ],
                'item_details' => [
                    [
                        'id' => $room->id,
                        'price' => $room->price,
                        'quantity' => count($order_times),
                        'name' => $room->room_name . ' - ' . $request->order_date,
                    ]
                ],
                'customer_details' => [
                    'first_name' => session('logged_in_user')->username ?? 'Customer',
                    'email' => session('logged_in_user')->email ?? 'customer@example.com',
                ],
                'expiry' => [
                    'start_time' => date('Y-m-d H:i:s O'),
                    'unit' => 'minutes',
                    'duration' => 15
                ]
            ];

            $snapToken = Snap::getSnapToken($params);

            // Update snap_token di database
            $order->update(['snap_token' => $snapToken]);

            return response()->json([
                'success' => true,
                'snap_token' => $snapToken,
                'order_id' => $code_order,  // TAMBAHKAN order_id
                'client_key' => config('midtrans.client_key')
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    // HAPUS METHOD handleCallback - tidak diperlukan lagi karena pakai webhook terpisah
}