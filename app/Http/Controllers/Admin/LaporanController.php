<?php

namespace App\Http\Controllers\Admin;

use PDF;
use App\Models\User;
use App\Models\Permohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    // public function index()
    // {
    //     $data = Permohonan::join('users', 'users.id', '=', 'tb_permohonan.id')
    //         ->join('tb_penerimaan', 'tb_penerimaan.id_permohonan', '=', 'tb_permohonan.id_permohonan')
    //         ->join('tb_pembayaran', 'tb_pembayaran.id_permohonan', '=', 'tb_permohonan.id_permohonan')
    //         ->select(['users.name', 'tb_permohonan.tanggal_permohonan', 'tb_permohonan.jenis_dana', 'tb_permohonan.keterangan_permohonan', 'tb_permohonan.nominal_acc',  'tb_penerimaan.bukti_penerimaan_kas', 'tb_penerimaan.bukti_penerimaan_bank', 'tb_penerimaan.id_penerimaan', 'tb_pembayaran.bukti_pembayaran_kas', 'tb_pembayaran.bukti_pembayaran_bank', 'tb_pembayaran.id_pembayaran'])
    //         ->get();

    //     dd($data);

    //     // $data_penerimaan = DB::select(DB::raw('SELECT u.name, tbp.tanggal_permohonan, tbp.jenis_dana, tbp.keterangan_permohonan, tbp.nominal_acc,  tn.bukti_penerimaan_kas, tn.bukti_penerimaan_bank, tn.id_penerimaan
    //     // FROM users u, tb_permohonan tbp, tb_penerimaan tn
    //     // WHERE u.id = tbp.id 
    //     // AND tbp.id_permohonan=tn.id_permohonan
    //     // '));


    //     return view('admin.laporan', [
    //         'title' => 'Laporan',
    //         'active' => 'Laporan',
    //         'data' => $data,
    //         // 'data_penerimaan' => $data_penerimaan
    //     ]);

    //     //return response()->json($data);
    // }

    public function index()
    {
        // $data = Permohonan::join('users', 'users.id', '=', 'tb_permohonan.id')
        //     ->join('tb_penerimaan', 'tb_penerimaan.id_permohonan', '=', 'tb_permohonan.id_permohonan')
        //     ->join('tb_pembayaran', 'tb_pembayaran.id_permohonan', '=', 'tb_permohonan.id_permohonan')
        //     ->select(['users.name', 'tb_permohonan.tanggal_permohonan', 'tb_permohonan.jenis_dana', 'tb_permohonan.keterangan_permohonan', 'tb_permohonan.nominal_acc', 'tb_penerimaan.bukti_penerimaan_kas', 'tb_penerimaan.bukti_penerimaan_bank', 'tb_penerimaan.id_penerimaan', 'tb_pembayaran.bukti_pembayaran_kas', 'tb_pembayaran.bukti_pembayaran_bank', 'tb_pembayaran.id_pembayaran'])
        //     ->get();

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

        return view('admin.laporan', [
            'title' => 'Laporan',
            'active' => 'Laporan',
            'data' => $data,
        ]);
    }


    public function export_pdf()
    {
        // return view('admin.laporan-pdf', [
        //     'title' => 'Laporan Bendahara',
        //     'active' => 'Laporan'
        //     // 'data' => $data
        // ]);

        // $data = [
        // 	'title' => 'Laporan Bendahara',
        // 	'active' => 'Laporan'
        // ];

        // $data['data'] = User::join('users', 'users.id', '=', 'tb_permohonan.id')
        // ->join('tb_penerimaan_kas', 'tb_penerimaan_kas.id_permohonan', '=', 'tb_permohonan.id_permohonan')
        // ->get(['users.*', 'tb_permohonan.*']);
        // $laporan = PDF::loadview('laporan_pdf',['laporan'=>$data]);
        // //mendownload laporan.pdf
        // return $laporan->download('laporan-pdf');

        // $laporan =  DB::select(DB::raw('SELECT u.name, tbp.tanggal_permohonan, tbp.jenis_dana, tbp.keterangan_permohonan, tbp.nominal_acc,  tn.bukti_transaksi_kas, tn.bukti_transaksi_bank, tn.id_penerimaan
        // FROM users u, tb_permohonan tbp, tb_penerimaan tn
        // WHERE u.id = tbp.id 
        // AND tbp.id_permohonan=tn.id_permohonan;
        // '));

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

    public function export_pdf_bulan()
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
        WHERE tb_permohonan.status_permohonan="3"
        AND tb_permohonan.tanggal_permohonan BETWEEN "2023-07-01" AND "2023-07-31"
        '));

        $pdf = PDF::loadview('admin.laporan-pdf', ['laporan' => $laporan])->setPaper('a4', 'landscape');
        return $pdf->download();
    }

    public function export_pdf_tahun()
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
        WHERE tb_permohonan.status_permohonan="3"
        AND tb_permohonan.tanggal_permohonan BETWEEN "2023-01-01" AND "2023-12-31"
        '));

        $pdf = PDF::loadview('admin.laporan-pdf', ['laporan' => $laporan])->setPaper('a4', 'landscape');
        return $pdf->download();
    }

    public function export_pdf_custom($tahun, $bulan)
    {
        // Ambil input dari pengguna pada formulir
        // Tanggal awal pada bulan dan tahun tertentu
        //$tanggal_awal = $tahun . '-' . $bulan . '-01';

        // Tanggal akhir pada bulan dan tahun tertentu (menggunakan fungsi date() untuk mendapatkan akhir bulan)
        //$tanggal_akhir = date('Y-m-t', strtotime($tanggal_awal));

        $laporan = DB::select(DB::raw("SELECT
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
        WHERE tb_permohonan.status_permohonan='3'
        AND tb_permohonan.tanggal_permohonan BETWEEN '$tahun' AND '$bulan' "));

        // //dd($laporan);

        $pdf = PDF::loadview('admin.laporan-pdf', ['laporan' => $laporan])->setPaper('a4', 'landscape');
        return $pdf->download();

        echo $tahun;
    
    }

    // public function export_pdf_custom($tahun, $bulan)
    // {

    //     // Tanggal awal pada bulan dan tahun tertentu
    //     $tanggal_awal = $tahun . '-' . $bulan . '-01';

    //     // Tanggal akhir pada bulan dan tahun tertentu (menggunakan fungsi date() untuk mendapatkan akhir bulan)
    //     $tanggal_akhir = date('Y-m-t', strtotime($tanggal_awal));

    //     $laporan = DB::select(DB::raw('SELECT
    //     users.name,
    //     tb_permohonan.tanggal_permohonan,
    //     tb_permohonan.jenis_dana,
    //     tb_permohonan.keterangan_permohonan,
    //     tb_permohonan.nominal_acc,
    //     tb_penerimaan.bukti_penerimaan_kas,
    //     tb_penerimaan.bukti_penerimaan_bank,
    //     tb_penerimaan.id_penerimaan,
    //     tb_pembayaran.bukti_pembayaran_kas,
    //     tb_pembayaran.bukti_pembayaran_bank,
    //     tb_pembayaran.id_pembayaran
    //     FROM
    //     tb_permohonan
    //     LEFT JOIN users USING(id)
    //     LEFT JOIN tb_penerimaan USING(id_permohonan)
    //     LEFT JOIN tb_pembayaran USING(id_permohonan)
    //     WHERE tb_permohonan.status_permohonan="3"
    //     AND tb_permohonan.tanggal_permohonan BETWEEN :tanggal_awal AND :tanggal_akhir'), ['tanggal_awal' => $tanggal_awal, 'tanggal_akhir' => $tanggal_akhir]);

    //     $pdf = PDF::loadview('admin.laporan-pdf', ['laporan' => $laporan])->setPaper('a4', 'landscape');
    //     return $pdf->download();
    // }
}
