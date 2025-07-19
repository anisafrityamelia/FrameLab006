<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            $credentials = $request->only('username', 'password');

            $user = DB::table('users')->where('username', $credentials['username'])->first();

            if ($user && Hash::check($credentials['password'], $user->password)) {
                session(['logged_in_user' => (object) $user]);

                if ($user->role === 'admin') {
                    return redirect('/dashboard_admin');
                } else {
                    return redirect('/landing_page1');
                }
            } else {
                return back()->withErrors(['login' => 'Username atau password salah'])->withInput();
            }
        }

        return view('pages.login');
    }
    public function logout(Request $request)
    {
        $request->session()->forget('logged_in_user'); 

        return redirect('/landing_page1');
    }
}
