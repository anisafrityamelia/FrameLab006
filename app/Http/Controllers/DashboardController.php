<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukRoom;
use App\Models\Feedback;
use App\Models\Users;

class DashboardController extends Controller
{
    public function index()
    {
        $roomCount = ProdukRoom::count(); 
        $feedbackCount = Feedback::count();
        $userCount = Users::count();

        return view('pages.dashboard_admin', compact('roomCount', 'feedbackCount', 'userCount'));
    }
}