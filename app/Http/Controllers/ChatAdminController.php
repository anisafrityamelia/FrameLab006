<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatAdminController extends Controller
{
    public function index()
    {
        return view('pages.chat_admin');
    }
}
