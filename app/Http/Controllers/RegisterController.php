<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {

            $validator = Validator::make($request->all(), [
                'username' => 'required|unique:users',
                'email' => 'required|email',
                'noTelepon' => 'required',
                'date' => 'required|date',
                'password' => 'required|min:6|same:confirm',
                'confirm' => 'required',
                'g-recaptcha-response' => 'required'
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            // Verifikasi CAPTCHA
            $captcha = app('captcha')->verifyResponse($request->input('g-recaptcha-response'));

            if (!$captcha) {
                return back()->withErrors(['captcha' => 'Captcha tidak valid.'])->withInput();
            }

            DB::table('users')->insert([
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'noTelepon' => $request->input('noTelepon'),
                'date' => $request->input('date'),
                'password' => Hash::make($request->input('password')),
                'created_at' => now()
            ]);

            return redirect('/login')->with('success', 'Registrasi berhasil, silakan login.');
        }

        return view('pages.register');
    }
}
