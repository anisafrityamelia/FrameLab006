<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukRoom;

class LandingPage1Controller extends Controller
{
    public function index()
    {
        $rooms = ProdukRoom::inRandomOrder()->take(8)->get();
        return view('pages.landing_page1', compact('rooms'));
    }
}
