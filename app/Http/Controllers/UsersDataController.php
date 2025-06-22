<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersDataController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->get();

        return view('pages.users_data_admin', compact('users'));
    }

    public function search(Request $request)
    {
        $query = DB::table('users');

        if ($request->has('keyword') && $request->keyword != '') {
            $keyword = $request->keyword;
            $query->where('username', 'like', $keyword . '%');
        }

        $users = $query->get();
        return view('pages.users_data_admin', compact('users'));
    }

    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();

        return redirect()->route('users_data_admin')->with('success', 'User deleted successfully!');
    }
}
