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

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);

            $data['photo'] = $filename;
        }

        DB::table('users')->where('id', $user->id)->update($data);

        $updatedUser = DB::table('users')->where('id', $user->id)->first();
        session(['logged_in_user' => (object) $updatedUser]);

        return redirect('/edit_profile')->with('success', 'Profil berhasil diperbarui!');
    }
}
