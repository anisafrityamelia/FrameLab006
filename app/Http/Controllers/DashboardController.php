<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukRoom;
use App\Models\ProdukPartner;
use App\Models\Users;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $roomCount = ProdukRoom::count(); 
        $partnerCount = ProdukPartner::count();
        $userCount = Users::count();
        $orderCount = Order::count();

        return view('pages.dashboard_admin', compact('roomCount', 'partnerCount', 'userCount', 'orderCount'));
    }
}