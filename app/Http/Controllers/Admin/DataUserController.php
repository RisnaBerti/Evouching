<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DataUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.data-user', [
            'users' => $users,
            'title' => 'Data User',
            'active' => 'Data User'
        ]);
    }

    //fungsi add user
    public function add(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'no_hp' => 'required',
            'divisi' => 'required',
            'jabatan' => 'required',
            'alamat' => 'required',
        ]);


        User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt(12345678),
                'no_hp' => $request->no_hp,
                'divisi' => $request->divisi,
                'jabatan' => $request->jabatan,
                'alamat' => $request->alamat,
                'is_active' => 0,
                'role_id' => 4,
            ]
        );
        return redirect()->route('auth.user')->with(['success' => 'User berhasil ditambahkan']);
    }

    //fungsi active user
    // public function is_active($id)
    // {
    //     $user = User::find($id);
    //     $user->is_active = 1;
    //     $user->update();
    //     return redirect()->route('auth.user')->with(['success' => 'User berhasil diaktifkan']);
    // }
}
