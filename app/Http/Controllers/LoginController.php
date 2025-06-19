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

            // Ambil user dari database berdasarkan username
            $user = DB::table('users')->where('username', $credentials['username'])->first();

            // Cek apakah user ada dan password cocok
            if ($user && Hash::check($credentials['password'], $user->password)) {
                // Simpan data user ke session (pakai object biar bisa ->akses)
                session(['logged_in_user' => (object) $user]);

                // ✅ Redirect berdasarkan role
                if ($user->role === 'admin') {
                    return redirect('/dashboard_admin');
                } else {
                    return redirect('/landing_page1');
                }
            } else {
                // Gagal login
                return back()->withErrors(['login' => 'Username atau password salah'])->withInput();
            }
        }

        return view('pages.login');
    }
}
