<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPage1Controller extends Controller
{
        public function index()
    {
        return view('pages.landing_page1');
    }
}
