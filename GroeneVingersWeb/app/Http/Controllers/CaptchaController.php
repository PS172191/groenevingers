<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaptchaController extends Controller
{
    public function index()
    {
        return view('captcha');
    }

    public function submitCaptcha(Request $request)
    {
        $request->validate([
            'naam' => 'required',
            'email' => 'required|email',
            'vraag' => 'required',
            'captcha' => 'required|captcha',
        ],
            [
                'captcha' => 'Invalid captcha code.',
            ]);
        exit('You are here :) .');
    }

    public function refreshCaptcha()
    {
        return response()->json([
            'captcha' => captcha_img(),
        ]);
    }
}
