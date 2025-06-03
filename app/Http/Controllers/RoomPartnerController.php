<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomPartnerController extends Controller
{
    public function index()
    {
        return view('pages.room_partner_admin');
    }
}
