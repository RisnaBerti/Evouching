<?php

namespace App\Http\Controllers\Admin;
use App\Models\Permohonan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PengajuanCA;

class CaController extends Controller
{
    public function index()
    {
        return view('admin.penerimaan-ca', [
            'title' => 'PENERIMAAN CA',
            'active' => 'PENERIMAAN CA'
        ]);
    }

    public function pembayaran_ca()
    {
        return view('admin.pembayaran-ca', [
            'title' => 'PEMBAYARAN CA',
            'active' => 'PEMBAYARAN CA'
        ]);
    }

    public function getmax_ca()
    {
        $maxValue = PengajuanCA::max('no_resi_ca');

        if ($maxValue == null) {
            $maxValue = 0;
        }
        return response()->json($maxValue);
    }
    public function get()
    {
        $data['data'] = Permohonan::join('users', 'users.id', '=', 'tb_permohonan.id')
        ->join('tb_ca', 'tb_ca.id_permohonan', '=', 'tb_permohonan.id_permohonan')
        ->where('tb_permohonan.jenis_dana', '=', 'Chartered Accountant')
        ->get(['users.id', 'users.name', 'users.jabatan', 'users.divisi', 'tb_permohonan.id_permohonan', 'tb_permohonan.nominal_acc', 'tb_permohonan.keterangan_permohonan', 'tb_ca.bukti_transaksi', 'tb_ca.periode_ca']);

    return $data;
    }
}
