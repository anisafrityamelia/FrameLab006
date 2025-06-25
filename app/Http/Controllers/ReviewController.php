<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\ProdukRoom;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        // Ambil order_id dari parameter URL
        $order_id = $request->get('order_id');
        
        // Debug: Log untuk melihat apakah order_id diterima
        \Log::info('Review page accessed with order_id: ' . $order_id);
        
        if (!$order_id) {
            // Jika tidak ada order_id, tampilkan halaman review umum
            return view('pages.review')->with('message', 'Silakan berikan review Anda');
        }
        
        // Cari order berdasarkan code_order
        $order = Order::where('code_order', $order_id)->first();
        
        if (!$order) {
            \Log::warning('Order not found: ' . $order_id);
            return view('pages.review')->with('error', 'Order tidak ditemukan');
        }
        
        return view('pages.review', compact('order'));
    }
    
    // Method untuk menyimpan review
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|max:500'
        ]);
        
        // Logic untuk menyimpan review ke database
        // Anda bisa buat model Review atau tambah kolom di tabel Order
        
        return redirect('/')->with('success', 'Terima kasih atas review Anda!');
    }
}