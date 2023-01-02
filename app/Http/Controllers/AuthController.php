<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login', [
            'title' => 'Sign In',
            'active' => 'login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        $user = Auth::user();
            //cek apakah user active atau tidak
            if ($user->is_active == 1) {
                return redirect()->intended('dashboard');
            } else {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Maaf akun Anda belum aktif'
                ])->onlyInput('email');
            }
        }

        return back()->withErrors([
        'email' => 'Maaf email atau password Anda salah'
        ])->onlyInput('email');

        


        
    }

    


    public function forgot_password()
    {
        return view('auth/forgot-password', ['title' => 'Forgot Password']);
    }
}
