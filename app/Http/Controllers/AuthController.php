<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login', [
            'title' => 'Sign In',
            'active' => 'Sign In'
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
            //cek user active atau tidak
            $user = Auth::user();
            if ($user->is_active == '1') {
                // cek role
                if ($user->role_id == '1') {
                    return redirect()->intended('bendahara');
                } else if ($user->role_id == '2') {
                    return redirect()->intended('dashboard-manajer');
                } else if ($user->role_id == '3') {
                    return redirect()->intended('pemeriksa');
                } else if ($user->role_id == '4') {
                    return redirect()->intended('dashboard-pemohon');
                }
            } else {
                return redirect()->route('auth-login')->with('status', 'Your account is not active, please contact admin!');
            }
        }

        return redirect()->route('auth-login')->with('status', 'Your email or password is incorrect!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function forgot_password()
    {
        return view(
            'auth.forgot-password',
            ['title' => 'Forgot Password']
        );
    }

    public function reset_password()
    {
        return view(
            'auth.reset-password',
            ['title' => 'Reset Password']
        );
    }






    // public function update_profile(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email:dns',
    //     ]);

    //     $user = Auth::user();
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->save();

    //     return redirect()->route('profile')->with('status', 'Profile updated successfully!');
    // }


}
