<?php

namespace App\Http\Controllers\Manajer;
use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AkunControllerManajer extends Controller
{
    
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        return view('manajer.profile-manajer', [
            'title' => 'Profile',
            'active' => 'Profile'
        ]);
    }

    //fungsi profile
    public function profile()
    {
        return view('manajer.edit-profile-manajer', [
            'title' => 'Profile',
            'active' => 'Profile'
        ]);
    }

    //fungsi update profile
    public function update_profile(Request $request)
    {
        if (!$request->id == Auth::id()) {

            $request->validate([
                'email' => 'required|email|unique:users,email' 
            ]);
        }

        $user = User::find(Auth::id());
        $user->name = $request->name;
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;
        $user->divisi = $request->divisi;
        $user->jabatan = $request->jabatan;
        $user->alamat =  $request->alamat;
        $user->update();

        return redirect()->route('profile_manajer')->with('success', 'Profile berhasil diupdate');
    }

    //fungsi change password
    public function change_password()
    {
        return view('manajer.change-password-manajer', [
            'title' => 'Change Password',
            'active' => 'Change Password'
        ]);
    }

    //fungsi update password
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
            return redirect()->route('change_password_manajer')->with('success', 'Password berhasil diupdate');
        } else {
            return redirect()->route('change_password_manajer')->with('error', 'Password lama tidak sesuai');
        }
    }
}
