<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataVerificationController extends Controller
{
    public function index()
    {
        return view('pages.data_verification');
    }
}