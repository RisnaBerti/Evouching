<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permohonan;


use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PembayaranKas;
use App\Models\PenerimaanKas;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use DB; //import fungsi query builder

class PengajuanAdmin extends Controller
{
    public function index()
    {
        $data = Permohonan::all();
        return view(
            'admin/pengajuan-admin',
            [
                'title' => 'Permohonan Dana',
                'active' => 'Permohonan Dana',
                'data' => $data
            ]);
    }

    //fungsi get data
    public function get()
    {
        // $return['data'] = Permohonan::all();

        $return['data']  = Permohonan::join('users', 'users.id', '=', 'tb_permohonan.id')
            ->get(['users.*', 'tb_permohonan.*']);

        return response()->json($return);
    }

    //fungsi edit data
    public function edit(Request $request)
    {
        $permohonan = Permohonan::findOrFail($request->id_permohonan);
        $permohonan->nominal_acc = $request->nominal_acc;
        $permohonan->status_permohonan = '1';
        $permohonan->jenis_dana = $request->jenis_dana;
        $permohonan->ttd_bendahara = '1';
        $permohonan->update();

        if ($permohonan->jenis_dana == 'Pembayaran Kas') {
            PembayaranKas::create(
                [
                    'id_pembayaran_kas' => str_replace('-', '', Str::uuid()),
                    'id_permohonan' => $request->id_permohonan,
                    'no_resi_bayar_kas' => '0',
                    'tanggal_pembayaran_kas' => '0',
                    'bukti_transaksi' => '0',
                    'status' => '0'
                ]
            );
        } else if ($permohonan->jenis_dana == 'Penerimaan Kas') {
            PenerimaanKas::create(
                [
                    'id_penerimaan_kas' => str_replace('-', '', Str::uuid()),
                    'id_permohonan' => $request->id_permohonan,
                    'no_resi_terima_kas' => '0',
                    'tanggal_penerimaan_kas' => '0',
                    'bukti_transaksi' => '0',
                    'status' => '0'
                ]
            );
        } else if ($permohonan->jenis_dana == 'Pengajuan Dana') {
            // PengajuanDana::create(
            //     [
            //         'id_pengajuan_dana' => str_replace('-', '', Str::uuid()),
            //         'id_permohonan' => $request->id_permohonan,
            //         'no_resi_pengajuan_dana' => '0',
            //         'tanggal_pengajuan_dana' => '0',
            //         'bukti_transaksi' => '0',
            //         'status' => '0'
            //     ]
            // );
        }
        
        return "success";
    }
}
