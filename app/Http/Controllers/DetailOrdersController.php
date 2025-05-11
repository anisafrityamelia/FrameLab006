<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailOrdersController extends Controller
{
    public function index()
    {
        return view('pages.detail_my_orders');
    }
}