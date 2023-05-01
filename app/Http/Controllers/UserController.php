<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('auth.profile', [
            'title' => 'Profile',
            'active' => 'Profile'
        ]);
    }

    //fungsi profile
    public function profile()
    {
        return view('auth.edit-profile', [
            'title' => 'Profile',
            'active' => 'Profile'
        ]);
    }

    //fungsi update profile
    public function update_profile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'no_hp' => 'required|numeric|digits_between:10,13|unique:users,no_hp,' . Auth::user()->id . ',id',
            'divisi' => 'required',
            'jabatan' => 'required',
            'alamat' => 'required',
        ]);

        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->divisi = $request->divisi;
        $user->jabatan = $request->jabatan;
        $user->no_hp = $request->no_hp;
        $user->alamat = $request->alamat;
        $user->update();

        return redirect()->route('profile_bendahara')->with('success', 'Profile berhasil diupdate');
    }

    //fungsi change password
    public function change_password()
    {
        return view('auth.change-password', [
            'title' => 'Change Password',
            'active' => 'Change Password'
        ]);
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ]);

        $user = User::find(Auth::user()->id);
        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->update();
            return redirect()->route('change_password_bendahara')->with('success', 'Password berhasil diupdate');
        } else {
            return redirect()->route('change_password_bendahara')->with('error', 'Password lama tidak sesuai');
        }
    }
}
