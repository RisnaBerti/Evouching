<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    //fungsi profile
    public function profile()
    {
        return view('auth.profile', [
            'title' => 'Profile',
            'active' => 'Profile'
        ]);
    }

    //fungsi update profile
    public function update_profile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns',
            'no_hp' => 'required',
            'divisi' => 'required',
            'jabatan' => 'required',
            'alamat' => 'required',
        ]);

        $user = User::find(Auth::user()->id_user);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;
        $user->divisi = $request->divisi;
        $user->jabatan = $request->jabatan;
        $user->alamat = $request->alamat;
        $user->save();

        return redirect()->route('profile')->with('success', 'Profile berhasil diupdate');
    }

    //fungsi change password
    public function change_password(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed',
        ]);

        $user = User::find(Auth::user()->id_user);
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('profile')->with('success', 'Password berhasil diupdate');
    }


}
