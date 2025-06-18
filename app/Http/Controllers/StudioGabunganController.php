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

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        if (empty($keyword)) {
            // Kalau keyword kosong, ambil semua data seperti saat awal halaman tampil
            $dataPartner = ProdukPartner::all();
            $dataRoom = ProdukRoom::all();
        } else {
            // Kalau ada keyword, filter sesuai nama
            $dataPartner = ProdukPartner::where('room_name', 'like', '%' . $keyword . '%')
                ->select('id', 'room_name', 'photo', 'studio_type')
                ->get()
                ->map(function ($item) {
                    $item->kategori = 'partner';
                    return $item;
                });


            $dataRoom = ProdukRoom::where('room_name', 'like', '%' . $keyword . '%')
                ->select('id', 'room_name', 'photo', 'price', 'studio_type')
                ->get()
                ->map(function ($item) {
                    $item->kategori = 'room';
                    return $item;
                });
        }

        $dataGabungan = $dataPartner->merge($dataRoom)->values();

        return response()->json($dataGabungan);
    }
}