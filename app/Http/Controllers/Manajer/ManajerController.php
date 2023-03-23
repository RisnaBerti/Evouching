<?php

namespace App\Http\Controllers\Manajer;
use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Http\Request;


class ManajerController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        return view('manajer.dashboard-manajer',
        [
            'title' => 'Dashboard',
            'active' => 'dashboard-manajer',
           'userCount' => $userCount ,
        ]);
    }
}
