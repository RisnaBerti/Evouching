<?php

namespace App\Http\Controllers;

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
}
