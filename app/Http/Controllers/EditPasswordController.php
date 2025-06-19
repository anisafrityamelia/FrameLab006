<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EditPasswordController extends Controller
{
    public function index()
    {
        return view('pages.edit_password');
    }

    public function update(Request $request)
    {
        $user = session('logged_in_user');

        // Validasi password lama cocok
        $current = DB::table('users')->where('id', $user->id)->first();

        if (!Hash::check($request->password, $current->password)) {
            return back()->withErrors(['password' => 'Password lama salah']);
        }

        // Update password baru (hash)
        DB::table('users')->where('id', $user->id)->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect('/edit_password')->with('success', 'Password berhasil diperbarui!');
    }
}
