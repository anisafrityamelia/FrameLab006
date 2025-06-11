<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukPartner;
use App\Models\ProdukRoom;

class StudioGabunganController extends Controller
{
    public function index()
    {   
        $dataPartner = ProdukPartner::all();
        $dataRoom = ProdukRoom::all();
        $dataGabungan = $dataPartner->merge($dataRoom);
        return view('pages.tampilan_studiogabungan', ['data' => $dataGabungan]);
    }
}