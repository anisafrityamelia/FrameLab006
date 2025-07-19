<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukRoom;
use App\Models\Review;
use App\Models\Order;

class DetailStudioRoomController extends Controller
{
    public function show($id)
    {
        $room = ProdukRoom::findOrFail($id);

        $selectedDate = request()->get('order_date') ?? date('Y-m-d'); 
        $bookedTimes = Order::where('room_id', $id)
            ->where('order_date', $selectedDate)
            ->where('payment_status', 'paid')
            ->pluck('order_times')
            ->flatMap(function ($item) {
                if (is_array($item)) return $item;
                return json_decode($item, true) ?? [];
            })
            ->toArray();

        $reviews = Review::where('room_id', $id)
                        ->orderBy('created_at', 'desc')
                        ->get();

        $totalReviews = $reviews->count();
        $averageRating = $totalReviews > 0 ? round($reviews->avg('rating'), 1) : 0;
        
        $ratingDistribution = [];
        for ($i = 1; $i <= 5; $i++) {
            $ratingDistribution[$i] = $reviews->where('rating', $i)->count();
        }

        $ratingPercentages = [];
        foreach ($ratingDistribution as $rating => $count) {
            $ratingPercentages[$rating] = $totalReviews > 0 ? round(($count / $totalReviews) * 100, 1) : 0;
        }

        $recentReviews = $reviews->take(5);

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
            'chartData',
            'bookedTimes'
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

    public function getBookedTimes(Request $request)
    {
        $roomId = $request->room_id;
        $date = $request->order_date;

        $bookedTimes = Order::where('room_id', $roomId)
            ->where('order_date', $date)
            ->where('payment_status', 'paid')
            ->pluck('order_times')
            ->flatMap(function ($item) {
                if (is_array($item)) return $item;
                return json_decode($item, true) ?? [];
            })
            ->toArray();

        return response()->json($bookedTimes);
    }
}