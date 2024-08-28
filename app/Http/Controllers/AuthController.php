<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('public.login');
    }

    public function authenticate(Request $request)
    {
        $infoLogin = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($infoLogin, $request->remember ?? 0)) {
            $request->session()->regenerate();

            return redirect()->route('public.home');
        }

        return redirect()->route('login')->withErrors([
            'username' => __('error_login'),
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }
}
