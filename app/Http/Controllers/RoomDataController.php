<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomDataController extends Controller
{
    public function index()
    {
        return view('pages.room_data_admin');
    }
}