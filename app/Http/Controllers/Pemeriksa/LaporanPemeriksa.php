<?php

namespace App\Http\Controllers\Pemeriksa;

use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class LaporanPemeriksa extends Controller
{
    public function index()
    {
        $data = DB::select(DB::raw('SELECT users.name, tb_permohonan.tanggal_permohonan, tb_permohonan.jenis_dana, tb_permohonan.keterangan_permohonan, tb_permohonan.nominal_acc, tb_penerimaan_kas.bukti_transaksi, tb_pembayaran_kas.bukti_transaksi
        FROM users, tb_permohonan, tb_penerimaan_kas, tb_pembayaran_kas
        WHERE users.id = tb_permohonan.id
        '));

        return view('pemeriksa.laporan', [
            'title' => 'Laporan',
            'active' => 'Laporan',
            'data' => $data
        ]);

        //return response()->json($data);
    }

    public function export_pdf()
    {

        $laporan =  DB::select(DB::raw('SELECT users.name, tb_permohonan.tanggal_permohonan, tb_permohonan.jenis_dana, tb_permohonan.keterangan_permohonan, tb_permohonan.nominal_acc, tb_penerimaan_kas.bukti_transaksi, tb_pembayaran_kas.bukti_transaksi
        FROM users, tb_permohonan, tb_penerimaan_kas, tb_pembayaran_kas
        WHERE users.id = tb_permohonan.id
        '));
 
    	$pdf = PDF::loadview('admin.laporan-pdf',['laporan'=>$laporan])->setPaper('a4', 'landscape');
    	return $pdf->download();
    }
}
