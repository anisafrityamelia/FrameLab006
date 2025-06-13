<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukRoom;

class DetailStudioRoomController extends Controller
{
    public function show($id)
    {
        $room = ProdukRoom::findOrFail($id);
        return view('pages.detail_studio_room', compact('room'));
    }
}
