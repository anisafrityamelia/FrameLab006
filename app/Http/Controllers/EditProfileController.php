<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditProfileController extends Controller
{
    public function index()
    {
        return view('pages.edit_profile');
    }

    public function update(Request $request)
    {
        $user = session('logged_in_user');

        $data = [
            'username' => $request->input('username'),
            'noTelepon' => $request->input('noTelepon'),
            'date' => $request->input('date'),
        ];

        // Cek jika ada file foto di-upload
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);

            // Simpan nama file ke kolom photo
            $data['photo'] = $filename;
        }

        // Update ke database
        DB::table('users')->where('id', $user->id)->update($data);

        // Refresh session setelah update
        $updatedUser = DB::table('users')->where('id', $user->id)->first();
        session(['logged_in_user' => (object) $updatedUser]);

        return redirect('/edit_profile')->with('success', 'Profil berhasil diperbarui!');
    }
}
