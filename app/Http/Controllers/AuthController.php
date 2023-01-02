<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        return view('auth/login', ["title" => "Sign In"]);
    }



    public function login()
    {
        
        return view('admin/dashboard-admin', ["title" => "Dashboard"]);
            
    }

    // public function login_action(Request $request)
    // {
        // $credentials = $request->validate([
        //     'email' => ['required', 'email'],
        //     'password' => ['required', 'min:8'],
        // ]);
        
 
        // if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
        //     $request->session()->regenerate();
        //     return redirect()->intended('admin/dashboard-admin'); // redirect to dashboard
        // }
 
        // return back()->withErrors([
        //     'email' => 'Wrong email or password',
        // ])->onlyInput('email');

        // return view('admin/dashboard-admin', ['title' => 'Dashboard']);

        
    // }





    public function forgot_password()
    {
        return view('auth/forgot-password', ['title' => 'Forgot Password']);
    }
}
