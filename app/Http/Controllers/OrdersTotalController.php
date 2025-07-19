<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrdersTotalController extends Controller
{
    public function index()
    {
        $orders = Order::with('room')->orderBy('created_at', 'desc')->get();
        
        return view('pages.orders_total_admin', compact('orders'));
    }

    public function markAsPaid(Order $order)
    {
        try {
            $order->update(['payment_status' => 'paid']);
            
            return response()->json([
                'success' => true,
                'message' => 'Order berhasil ditandai sebagai paid'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal update status: ' . $e->getMessage()
            ]);
        }
    }

    public function deleteOrder(Order $order)
    {
        try {
            $order->delete();
            
            return response()->json([
                'success' => true,
                'message' => 'Order berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus order: ' . $e->getMessage()
            ]);
        }
    }
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'payment_status' => 'required|in:paid,cancelled'
        ]);

        try {
            $order->update([
                'payment_status' => $request->payment_status === 'cancelled' ? 'failed' : 'paid'
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Status berhasil diperbarui.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal update status: ' . $e->getMessage()
            ]);
        }
    }
    
}