<?php

namespace App\Http\Controllers\Pemohon;

use App\Models\ModelUmum;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PemohonController extends Controller
{
    public function index()
    {
        $data = ModelUmum::datapermohonandana()->where('id', Auth::user()->id);
        return view('pemohon.dashboard-pemohon', [
            'title' => 'Dashboard',
            'active' => 'dashboard-pemohon',
            'data' => $data
        ]);
    }

    public function permohonan_dana()
    {
        return view('pemohon.permohonan-dana', [
            'title' => 'Permohonan',
            'active' => 'permohonan'
        ]);
    }
}
