<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class MyOrdersController extends Controller
{
    public function index(Request $request)
    {
        $loggedUser = session('logged_in_user');

        if (!$loggedUser || $loggedUser->role !== 'user') {
            return redirect('/landing_page1');
        }

        $orders = Order::with('room')
            ->where('user_id', $loggedUser->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.my_orders', compact('orders'));
    }
}
