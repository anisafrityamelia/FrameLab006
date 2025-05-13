<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfirmSewaPhotoController extends Controller
{
        public function index()
    {
        return view('pages.confirm_sewa_photo');
    }
}
