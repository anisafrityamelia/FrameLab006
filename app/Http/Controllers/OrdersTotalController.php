<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdersTotalController extends Controller
{
    public function index()
    {
        return view('pages.orders_total_admin');
    }
}