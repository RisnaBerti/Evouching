<?php

namespace App\Http\Controllers\Pemohon;

use App\Models\ModelUmum;
use App\Models\Permohonan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PengajuanCaController extends Controller
{
    function index()
    {
        $permohonan = ModelUmum::datapermohonandana()->where('id', Auth::user()->id);
        return view('pemohon.pengajuan-ca', [
            'title' => 'Pengajuan CA',
            'active' => 'pengajuan-ca',
            'permohonan' => $permohonan
        ]);
    }

    public function get()
    {
        // $permohonan['data'] = Permohonan::join('users', 'users.id', '=', 'tb_permohonan.id')
        // ->where('tb_permohonan.id', Auth::user()->id)
        // ->where('jenis_dana', 'Pengajuan CA')
        // ->get(['users.name', 'users.jabatan', 'users.divisi', 'tb_permohonan.*']);

        $permohonan['data'] = ModelUmum::getDataPengajuanCa()->where('id', Auth::user()->id)->where('jenis_dana', 'Pengajuan CA');
        return response()->json($permohonan);
    }

    //fungsi add
    public function add(Request $request)
    {
        $permohonan = new Permohonan();
        $permohonan->id_permohonan = str_replace('-', '', Str::uuid());
        $permohonan->id = Auth::user()->id;
        $permohonan->no_resi_ajuan = $request->no_resi_ajuan;
        $permohonan->tanggal_permohonan = $request->tanggal_permohonan;
        $permohonan->harga_satuan = $request->harga_satuan;
        $permohonan->jumlah_satuan = $request->jumlah_satuan;
        $permohonan->total_dana_ajuan = $request->total_dana_ajuan;
        $permohonan->nominal_acc ='0';
        $permohonan->jenis_dana = 'Chartered Accountant';
        $permohonan->keterangan_permohonan = $request->keterangan_permohonan;
        $permohonan->terbilang = $request->terbilang;
        $permohonan->ttd_pemohon = '1';
        $permohonan->ttd_manajer = '0';
        $permohonan->ttd_pemeriksa = '0';
        $permohonan->ttd_bendahara = '0';
        $permohonan->status_permohonan = '0';
        $permohonan->status_upload = '0';
        $permohonan->save();

        return response()->json($permohonan);
    }

    public function getmax3()
    {
        $maxValue = Permohonan::max('no_resi_ajuan');

        if ($maxValue == null) {
            $maxValue = 0;
        }
        return response()->json($maxValue);
    }
}
