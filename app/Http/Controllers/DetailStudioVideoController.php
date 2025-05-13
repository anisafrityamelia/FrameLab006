<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailStudioVideoController extends Controller
{
        public function index()
    {
        return view('pages.detail_studio_video');
    }
}
