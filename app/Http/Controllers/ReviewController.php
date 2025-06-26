<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\ProdukRoom;
use App\Models\Review;
use Illuminate\Support\Facades\Log;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        // Ambil order_id dari parameter URL
        $order_id = $request->get('order_id');
        
        // Debug: Log untuk melihat apakah order_id diterima
        Log::info('Review page accessed with order_id: ' . $order_id);
        
        if (!$order_id) {
            // Jika tidak ada order_id, tampilkan halaman review umum
            return view('pages.review')->with('message', 'Silakan berikan review Anda');
        }
        
        // Cari order berdasarkan code_order
        $order = Order::where('code_order', $order_id)->first();
        
        if (!$order) {
            Log::warning('Order not found: ' . $order_id);
            return view('pages.review')->with('error', 'Order tidak ditemukan');
        }
        
        // Cek apakah sudah pernah review
        $existingReview = Review::where('code_order', $order_id)->first();
        
        if ($existingReview) {
            return view('pages.review')->with('message', 'Anda sudah memberikan review untuk order ini');
        }
        
        return view('pages.review', compact('order'));
    }
    
    // Method untuk menyimpan review via AJAX
    public function submitRating(Request $request)
    {
        try {
            // Validasi input
            $validated = $request->validate([
                'rating' => 'required|integer|min:1|max:5',
                'feedback' => 'required|string|max:500',
                'order_id' => 'required|string'
            ]);
            
            // Cari order berdasarkan code_order
            $order = Order::where('code_order', $request->order_id)->first();
            
            if (!$order) {
                return response()->json(['error' => 'Order tidak ditemukan'], 404);
            }
            
            // Cek apakah sudah pernah review
            $existingReview = Review::where('code_order', $request->order_id)->first();
            
            if ($existingReview) {
                return response()->json(['error' => 'Anda sudah memberikan review untuk order ini'], 400);
            }
            
            // Simpan review
            $review = Review::create([
                'code_order' => $request->order_id,
                'room_id' => $order->room_id,
                'user_name' => $order->customer_name ?? 'Anonymous',
                'user_email' => $order->customer_email,
                'rating' => $request->rating,
                'feedback' => $request->feedback
            ]);
            
            return response()->json([
                'success' => true, 
                'message' => 'Terima kasih atas review Anda!',
                'review' => $review
            ]);
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error submitting review: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            
            return response()->json([
                'error' => 'Terjadi kesalahan saat menyimpan review: ' . $e->getMessage()
            ], 500);
        }
    }
    
    // Method untuk menyimpan review (legacy form submit)
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|max:500'
        ]);
        
        // Cari order berdasarkan code_order
        $order = Order::where('code_order', $request->order_id)->first();
        
        if (!$order) {
            return redirect()->back()->with('error', 'Order tidak ditemukan');
        }
        
        // Simpan review
        Review::create([
            'code_order' => $request->order_id,
            'room_id' => $order->room_id,
            'user_name' => $order->customer_name ?? 'Anonymous',
            'user_email' => $order->customer_email,
            'rating' => $request->rating,
            'feedback' => $request->review
        ]);
        
        return redirect('/')->with('success', 'Terima kasih atas review Anda!');
    }
}