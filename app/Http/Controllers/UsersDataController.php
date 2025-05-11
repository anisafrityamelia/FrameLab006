<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersDataController extends Controller
{
    public function index()
    {
        return view('pages.users_data_admin');
    }
}