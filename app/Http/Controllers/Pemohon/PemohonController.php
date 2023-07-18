<?php

namespace App\Http\Controllers\Pemohon;

use App\Models\ModelUmum;
use App\Models\Permohonan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PemohonController extends Controller
{
    public function index()
    {
        $data = ModelUmum::datapermohonandana()->where('id', Auth::user()->id);
        $countDanaAccId = ModelUmum::countDanaAccId();
        return view('pemohon.dashboard-pemohon', [
            'title' => 'Dashboard',
            'active' => 'dashboard-pemohon',
            'data' => $data,
            'countDanaAccId' => $countDanaAccId
        ]);
    }

    public function permohonan_dana()
    {
        return view('pemohon.permohonan-dana', [
            'title' => 'Permohonan',
            'active' => 'permohonan'
        ]);
    }

    public function getDataActivity()
    {
        $data = Permohonan::where('id', Auth::user()->id)
        //->where('tb_permohonan.id', Auth::user()->id)
        ->orderBy('tb_permohonan.tanggal_permohonan')
        ->get('tb_permohonan.*');
        echo json_encode($data);
    }
}
