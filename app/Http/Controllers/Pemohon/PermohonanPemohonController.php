<?php

namespace App\Http\Controllers\Pemohon;

use App\Models\Permohonan;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PembayaranKas;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PermohonanPemohonController extends Controller
{
    public function permohonan_pemohon()
    {
        return view('pemohon.permohonan-dana', [
            'title' => 'Permohonan',
            'active' => 'permohonan'
        ]);
    }

    public function getmax()
    {
        $maxValue = Permohonan::max('no_resi_ajuan');

        if($maxValue == null){
            $maxValue = 0;
        }
        return response()->json($maxValue);
    }

    public function add(Request $request)
    {
        //fungsi add permohonan

        // $request->validate([
        //     'no_resi_ajuan' => 'required',
        //     'tanggal_permohonan' => 'required',
        //     'terbilang' => 'required',
        // ]);

        Permohonan::create(
            [
                $id_permohonan = str_replace('-', '', Str::uuid()),
                $id = Auth::user()->id,
                'id_permohonan' => $id_permohonan,
                'id' => ($id),
                'no_resi_ajuan' => $request->no_resi_ajuan,
                'tanggal_permohonan' => $request->tanggal_permohonan,
                'harga_satuan' => $request->harga_satuan_sum,
                'jumlah_satuan' => $request->jumlah_satuan_sum,
                'total_harga' => $request->total_harga_sum,
                'nominal_acc' => '0',
                'keterangan_permohonan' => $request->keterangan_permohonan,
                'terbilang' => $request->terbilang,
                'jenis_dana' => '0',
                'status_permohonan' => '0',
                'ttd_pemohonan' => '0',
                'ttd_manajer' => '0',
                'ttd_pemeriksa' => '0',
                'ttd_bendahara' => '0'

            ]
        );

        return "success";
    }

    // function simpanPembayaranKas(Request $request)
    // {
    //     PembayaranKas::create(
    //         [
    //             'id_pembayaran_kas' => str_replace('-', '', Str::uuid()),
    //             'id_permohonan' => $request->id_permohonan,
    //             'id' =>  Auth::user()->id,
    //             'no_resi_bayar_kas' => '0',
    //             'tanggal_pembayaran_kas' => '0',
    //             'bukti_transaksi' => 'deafult.jpg',
    //             'status' => '0'
    //         ]
    //     );
    // }
}
