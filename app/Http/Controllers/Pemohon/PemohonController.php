<?php

namespace App\Http\Controllers\Pemohon;

use App\Models\Permohonan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Str;

class PemohonController extends Controller
{
    public function index()
    {
        return view('pemohon.dashboard-pemohon', [
            'title' => 'Dashboard',
            'active' => 'dashboard-pemohon'
        ]);
    }

    
}
