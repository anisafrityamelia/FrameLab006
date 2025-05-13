<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudioGabunganController extends Controller
{
    public function index()
    {
        return view('pages.tampilan_studiogabungan');
    }
}