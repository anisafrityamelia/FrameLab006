<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukPartner;

class StudioGabunganController extends Controller
{
    public function index()
    {   
        $data = ProdukPartner::all();
        return view('pages.tampilan_studiogabungan', compact('data'));
    }
}