<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukRoom;
use App\Models\Review;

class DetailStudioRoomController extends Controller
{
    public function show($id)
    {
        $room = ProdukRoom::findOrFail($id);

        // Ambil reviews untuk room ini dengan relasi yang dioptimalkan
        $reviews = Review::where('room_id', $id)
                        ->orderBy('created_at', 'desc')
                        ->get();

        // Hitung statistik rating yang lebih detail
        $totalReviews = $reviews->count();
        $averageRating = $totalReviews > 0 ? round($reviews->avg('rating'), 1) : 0;
        
        // Hitung distribusi rating (1-5 stars)
        $ratingDistribution = [];
        for ($i = 1; $i <= 5; $i++) {
            $ratingDistribution[$i] = $reviews->where('rating', $i)->count();
        }

        // Hitung persentase untuk setiap rating
        $ratingPercentages = [];
        foreach ($ratingDistribution as $rating => $count) {
            $ratingPercentages[$rating] = $totalReviews > 0 ? round(($count / $totalReviews) * 100, 1) : 0;
        }

        // Ambil recent reviews untuk ditampilkan
        $recentReviews = $reviews->take(5);

        // Data untuk grafik rating (opsional)
        $chartData = [
            'labels' => ['5 Stars', '4 Stars', '3 Stars', '2 Stars', '1 Star'],
            'data' => [
                $ratingDistribution[5],
                $ratingDistribution[4], 
                $ratingDistribution[3],
                $ratingDistribution[2],
                $ratingDistribution[1]
            ]
        ];

        return view('pages.detail_studio_room', compact(
            'room', 
            'reviews', 
            'averageRating', 
            'totalReviews',
            'ratingDistribution',
            'ratingPercentages',
            'recentReviews',
            'chartData'
        ));
    }

    /**
     * Load more reviews via AJAX
     */
    public function loadMoreReviews(Request $request, $roomId)
    {
        $offset = $request->get('offset', 0);
        $limit = $request->get('limit', 5);

        $reviews = Review::where('room_id', $roomId)
                        ->orderBy('created_at', 'desc')
                        ->skip($offset)
                        ->take($limit)
                        ->get();

        $html = '';
        foreach ($reviews as $review) {
            $html .= view('partials.review_item', compact('review'))->render();
        }

        return response()->json([
            'html' => $html,
            'hasMore' => Review::where('room_id', $roomId)->count() > ($offset + $limit)
        ]);
    }

    /**
     * Get rating statistics for a room
     */
    public function getRatingStats($roomId)
    {
        $reviews = Review::where('room_id', $roomId)->get();
        $totalReviews = $reviews->count();
        
        if ($totalReviews == 0) {
            return response()->json([
                'averageRating' => 0,
                'totalReviews' => 0,
                'distribution' => array_fill(1, 5, 0)
            ]);
        }

        $averageRating = round($reviews->avg('rating'), 1);
        $distribution = [];
        
        for ($i = 1; $i <= 5; $i++) {
            $distribution[$i] = $reviews->where('rating', $i)->count();
        }

        return response()->json([
            'averageRating' => $averageRating,
            'totalReviews' => $totalReviews,
            'distribution' => $distribution,
            'percentages' => array_map(function($count) use ($totalReviews) {
                return round(($count / $totalReviews) * 100, 1);
            }, $distribution)
        ]);
    }
}