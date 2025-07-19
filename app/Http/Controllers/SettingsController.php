<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function index()
    {
        return view('pages.settings_admin');
    } 
    public function update(Request $request)
    {
        $user = session('logged_in_user');

        $current = DB::table('users')->where('id', $user->id)->first();

        if (!Hash::check($request->password, $current->password)) {
            return back()->withErrors(['password' => 'Password lama salah']);
        }

        DB::table('users')->where('id', $user->id)->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect('/settings_admin')->with('success', 'Password berhasil diperbarui!');
    }
}