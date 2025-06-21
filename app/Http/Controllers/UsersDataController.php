<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class UsersDataController extends Controller
{
    public function index()
    {
        // Ambil semua data user dari tabel users
        $users = DB::table('users')->get();

        return view('pages.users_data_admin', compact('users'));
    }
    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();

        return redirect()->route('users_data_admin')->with('success', 'User deleted successfully!');
    }
}
