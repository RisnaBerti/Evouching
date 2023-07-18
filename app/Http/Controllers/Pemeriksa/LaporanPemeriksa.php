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
        $data = DB::select(DB::raw('SELECT
        users.name,
        tb_permohonan.tanggal_permohonan,
        tb_permohonan.jenis_dana,
        tb_permohonan.keterangan_permohonan,
        tb_permohonan.nominal_acc,
        tb_penerimaan.bukti_penerimaan_kas,
        tb_penerimaan.bukti_penerimaan_bank,
        tb_penerimaan.id_penerimaan,
        tb_pembayaran.bukti_pembayaran_kas,
        tb_pembayaran.bukti_pembayaran_bank,
        tb_pembayaran.id_pembayaran
        FROM
        tb_permohonan
        LEFT JOIN users USING(id)
        LEFT JOIN tb_penerimaan USING(id_permohonan)
        LEFT JOIN tb_pembayaran USING(id_permohonan)
        WHERE tb_permohonan.status_permohonan="3"'));

        return view('pemeriksa.laporan', [
            'title' => 'Laporan',
            'active' => 'Laporan',
            'data' => $data
        ]);

        //return response()->json($data);
    }

    public function export_pdf()
    {

        $laporan = DB::select(DB::raw('SELECT
        users.name,
        tb_permohonan.tanggal_permohonan,
        tb_permohonan.jenis_dana,
        tb_permohonan.keterangan_permohonan,
        tb_permohonan.nominal_acc,
        tb_penerimaan.bukti_penerimaan_kas,
        tb_penerimaan.bukti_penerimaan_bank,
        tb_penerimaan.id_penerimaan,
        tb_pembayaran.bukti_pembayaran_kas,
        tb_pembayaran.bukti_pembayaran_bank,
        tb_pembayaran.id_pembayaran
        FROM
        tb_permohonan
        LEFT JOIN users USING(id)
        LEFT JOIN tb_penerimaan USING(id_permohonan)
        LEFT JOIN tb_pembayaran USING(id_permohonan)
        WHERE tb_permohonan.status_permohonan="3"'));

        $pdf = PDF::loadview('admin.laporan-pdf', ['laporan' => $laporan])->setPaper('a4', 'landscape');
        return $pdf->download();
    }
}
