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
    public function index()
    {
        // $data = Permohonan::join('users', 'users.id', '=', 'tb_permohonan.id')
        //     ->join('tb_penerimaan_kas', 'tb_penerimaan_kas.id_permohonan', '=', 'tb_permohonan.id_permohonan')
        //     // ->get();
        //     // ->join('tb_pembayaran_kas', 'tb_pembayaran_kas.id_permohonan', '=', 'tb_permohonan.id_permohonan')
        //     // ->get(['users.name', 'tb_permohonan.tanggal_permohonan','tb_permohonan.jenis_dana','tb_permohonan.keterangan_permohonan', 'tb_permohonan.nominal_acc', 'tb_permohonan.keterangan_permohonan' , 'tb_penerimaan_kas.bukti_transaksi' , 'tb_pembayaran_kas.bukti_transaksi']);
        //     ->select(['users.name', 'tb_permohonan.tanggal_permohonan', 'tb_permohonan.jenis_dana', 'tb_permohonan.keterangan_permohonan', 'tb_permohonan.nominal_acc',  'tb_penerimaan_kas.bukti_transaksi'])
        //     ->get();
        // return view('admin.laporan', [
        //     'title' => 'Laporan',
        //     'active' => 'Laporan',
        //     'data' => $data
        // ]);

        // $data = DB::table('tb_permohonan')
        // ->join('users', 'tb_permohonan.id', '=', 'users.id')
        // ->join('tb_pembayaran_kas', 'tb_permohonan.id_permohonan', '=', 'tb_pembayaran_kas.id_permohonan')
        // ->join('tb_penerimaan_kas', 'tb_permohonan.id_permohonan', '=', 'tb_penerimaan_kas.id_permohonan')
        // // 
        // // ->select('users.id', 'contacts.phone', 'orders.price')
        // ->select('users.name', 'tb_permohonan.tanggal_permohonan', 'tb_permohonan.jenis_dana', 'tb_permohonan.keterangan_permohonan', 'tb_permohonan.nominal_acc',  'tb_penerimaan_kas.bukti_transaksi')
        // ->get();

        $data = DB::select(DB::raw('SELECT users.name, tb_permohonan.tanggal_permohonan, tb_permohonan.jenis_dana, tb_permohonan.keterangan_permohonan, tb_permohonan.nominal_acc, tb_penerimaan_kas.bukti_transaksi, tb_pembayaran_kas.bukti_transaksi
        FROM users, tb_permohonan, tb_penerimaan_kas, tb_pembayaran_kas
        WHERE users.id = tb_permohonan.id
        '));

        return view('admin.laporan', [
            'title' => 'Laporan',
            'active' => 'Laporan',
            'data' => $data
        ]);

        //return response()->json($data);
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

        $laporan =  DB::select(DB::raw('SELECT users.name, tb_permohonan.tanggal_permohonan, tb_permohonan.jenis_dana, tb_permohonan.keterangan_permohonan, tb_permohonan.nominal_acc, tb_penerimaan_kas.bukti_transaksi, tb_pembayaran_kas.bukti_transaksi
        FROM users, tb_permohonan, tb_penerimaan_kas, tb_pembayaran_kas
        WHERE users.id = tb_permohonan.id
        '));
 
    	$pdf = PDF::loadview('admin.laporan-pdf',['laporan'=>$laporan])->setPaper('a4', 'landscape');
    	return $pdf->download();
    }
}
