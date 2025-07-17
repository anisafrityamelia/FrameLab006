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
                    return redirect('/dashboard_admin')->with('success', 'Login berhasil sebagai admin!');
                } else {
                    return redirect('/landing_page1')->with('success', 'Login berhasil!');
                }
            } else {
                // Gagal login
                return back()->withErrors(['login' => 'Username atau password salah'])->withInput();
            }
        }

        return view('pages.login');
    }
    public function logout(Request $request)
    {
        $request->session()->forget('logged_in_user'); // Hapus session spesifik
        // atau bisa pakai: $request->session()->flush(); // Hapus semua session

        return redirect('/landing_page1'); // Balikin ke landing page
    }
}
