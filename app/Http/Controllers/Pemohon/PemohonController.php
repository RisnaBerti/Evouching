<?php

namespace App\Http\Controllers\Pemohon;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PemohonController extends Controller
{
    public function index()
    {
        return view('pemohon.dashboard-pemohon', [
            'title' => 'Dashboard',
            'active' => 'dashboard-pemohon'
        ]);
    }

    public function permohonan_pengurus()
    {
        return view('pemohon.permohonan-dana', [
            'title' => 'Permohonan',
            'active' => 'permohonan'
        ]);
    }
}
