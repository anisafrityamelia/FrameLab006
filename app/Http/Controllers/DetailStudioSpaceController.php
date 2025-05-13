<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailStudioSpaceController extends Controller
{
        public function index()
    {
        return view('pages.detail_studio_space');
    }
}
