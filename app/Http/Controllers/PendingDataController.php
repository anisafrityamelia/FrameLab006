<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PendingDataController extends Controller
{
    public function index()
    {
        return view('pages.pending_data_admin');
    }
}