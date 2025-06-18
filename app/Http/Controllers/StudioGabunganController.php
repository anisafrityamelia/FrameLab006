<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukPartner;
use App\Models\ProdukRoom;

class StudioGabunganController extends Controller
{
    public function index()
    {
        $room = ProdukRoom::all();
        $partner = ProdukPartner::all();
        $data = $room->concat($partner);

        return view('pages.tampilan_studiogabungan', compact('data'));
    }
}