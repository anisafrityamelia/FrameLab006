<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'g-recaptcha-response' => 'required',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $captcha = app('captcha')->verifyResponse($request->input('g-recaptcha-response'));

            if (!$captcha) {
                return back()->withErrors(['captcha' => 'Captcha tidak valid.'])->withInput();
            }

            return back()->with('success', 'CAPTCHA sukses diverifikasi!');
        }

        return view('pages.register');
    }
}