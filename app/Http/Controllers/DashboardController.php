<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukRoom;

class DashboardController extends Controller
{
    public function index()
    {
        $roomCount = ProdukRoom::count(); 
        return view('pages.dashboard_admin', compact('roomCount'));
    }
}