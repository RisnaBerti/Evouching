<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Penerimaan;

use App\Models\Permohonan;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class KasController extends Controller
{
    protected $fpdf;

    public function __construct()
    {
        $this->fpdf = new Fpdf('P', 'mm', 'A4');
    }

    public function index()
    {
        return view('admin.penerimaan-kas', [
            'title' => 'Kas',
            'active' => 'Kas'
        ]);
    }

    public function pembayaran_kas()
    {
        return view('admin.pembayaran-kas', [
            'title' => 'Pembayaran Kas',
            'active' => 'Pembayaran Kas'
        ]);
    }

    public function getmax()
    {
        $maxValue = Penerimaan::max('no_resi_terima_kas');

        if ($maxValue == null) {
            $maxValue = 0;
        }
        return response()->json($maxValue);
    }

    public function get_penerimaan_kas()
    {
        $data['data'] = Permohonan::join('users', 'users.id', '=', 'tb_permohonan.id')
            ->join('tb_penerimaan', 'tb_penerimaan.id_permohonan', '=', 'tb_permohonan.id_permohonan')
            ->where('tb_permohonan.jenis_dana', '=', 'Penerimaan Kas')
            ->get(['users.id', 'users.name', 'users.jabatan', 'users.divisi', 'tb_permohonan.id_permohonan', 'tb_permohonan.nominal_acc', 'tb_permohonan.keterangan_permohonan', 'tb_penerimaan.bukti_penerimaan_kas']);

        return $data;
    }

    function ubah_penerimaan_kas(Request $request)
    { 
        Penerimaan::where('id_permohonan', $request->id_permohonan)
        ->update(['bukti_penerimaan_kas' => $request->bukti_transaksi, 
                'no_resi_terima_kas' => $request->no_resi_terima_kas, 
                'tanggal_penerimaan_kas' => $request->tanggal_penerimaan_kas]);

        return response()->json(['message' => 'success']);
    }

    //fungsi edit penerimaan kas
    public function edit_penerimaan_kas(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf|max:8048',
        ]);

        $ip = $request->id_permohonan;

        $fileName = $ip . '.' . $request->file->extension();
        $request->file->move(public_path('bukti'), $fileName);

        return response()->json(['message' => 'Operation Successful !', 'filename' => $fileName, 'no_resi_terima_kas' => $request->no_resi_terima_kas,  'id_permohonan' => $request->id_permohonan, 'tanggal_penerimaan_kas' => $request->tanggal_penerimaan_kas]);
    }

    public function get_penerimaan_kas_id(Request $request)
    {
        $data = Penerimaan::where('id_permohonan', $request->id_permohonan)->first();
        return response()->json($data);
    }

    public function ubah_penerimaan_kas_id(Request $request)
    {
        Penerimaan::where('id_permohonan', $request->id_permohonan)
        ->update(['bukti_penerimaan_kas' => $request->bukti_transaksi_edit, 
                'no_resi_terima_kas' => $request->no_resi_terima_kas_edit, 
                'tanggal_penerimaan_kas' => $request->tanggal_penerimaan_kas_edit]);

        return response()->json(['message' => 'success']);
    }

    public function edit_penerimaan_kas_id(Request $request)
    {
        $request->validate([
            'file_edit' => 'required|mimes:pdf|max:8048',
        ]);

        $ip = $request->id_permohonan_edit;

        $fileName = $ip . '.' . $request->file_edit->extension();
        $request->file_edit->move(public_path('bukti'), $fileName);

        return response()->json(['message' => 'Operation Successful !', 'filename' => $fileName, 'no_resi_terima_kas' => $request->no_resi_terima_kas_edit,  'id_permohonan' => $request->id_permohonan_edit, 'tanggal_penerimaan_kas' => $request->tanggal_penerimaan_kas_edit]);
    }

    // ======== PEMBAYARAN KAS =========

    public function getmax2()
    {
        $maxValue = Pembayaran::max('no_resi_bayar_kas');

        if ($maxValue == null) {
            $maxValue = 0;
        }
        return response()->json($maxValue);
    }

    //fungsi get data pembayaran kas
    public function get_pembayaran_kas()
    {
        $data['data'] = Permohonan::join('users', 'users.id', '=', 'tb_permohonan.id')
            ->join('tb_pembayaran', 'tb_pembayaran.id_permohonan', '=', 'tb_permohonan.id_permohonan')
            ->where('tb_permohonan.jenis_dana', '=', 'Pembayaran Kas')
            ->get(['users.id', 'users.name', 'users.jabatan', 'users.divisi', 'tb_permohonan.id_permohonan', 'tb_permohonan.nominal_acc', 'tb_permohonan.keterangan_permohonan', 'tb_pembayaran.bukti_pembayaran_kas']);

        return $data;
    }

    //fungsi ubah data pembayaran kas
    function ubah_pembayaran_kas(Request $request)
    { 
        Pembayaran::where('id_permohonan', $request->id_permohonan)
        ->update(['bukti_pembayaran_kas' => $request->bukti_transaksi, 
                'no_resi_bayar_kas' => $request->no_resi_bayar_kas, 
                'tanggal_pembayaran_kas' => $request->tanggal_pembayaran_kas]);

        return response()->json(['message' => 'success']);
    }

    //fungsi get data pembayaran kas by id
    public function get_pembayaran_kas_id(Request $request)
    {
        $data = Pembayaran::where('id_permohonan', $request->id_permohonan)->first();
        return response()->json($data);
    }

    //fungsi edit pembayaran kas
    public function edit_pembayaran_kas(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf|max:8048',
        ]);

        $ip = $request->id_permohonan;

        $fileName = $ip . '.' . $request->file->extension();
        $request->file->move(public_path('bukti'), $fileName);

        return response()->json(['message' => 'Operation Successful !', 'filename' => $fileName, 'no_resi_bayar_kas' => $request->no_resi_bayar_kas,  'id_permohonan' => $request->id_permohonan, 'tanggal_pembayaran_kas' => $request->tanggal_pembayaran_kas]);
    }

    public function ubah_pembayaran_kas_id(Request $request)
    {
        Pembayaran::where('id_permohonan', $request->id_permohonan)
        ->update(['bukti_pembayaran_kas' => $request->bukti_transaksi_edit, 
                'no_resi_bayar_kas' => $request->no_resi_bayar_kas_edit, 
                'tanggal_pembayaran_kas' => $request->tanggal_pembayaran_kas_edit]);

        return response()->json(['message' => 'success']);
    }

    public function edit_pembayaran_kas_id(Request $request)
    {
        $request->validate([
            'file_edit' => 'required|mimes:pdf|max:8048',
        ]);

        $ip = $request->id_permohonan_edit;

        $fileName = $ip . '.' . $request->file_edit->extension();
        $request->file_edit->move(public_path('bukti'), $fileName);

        return response()->json(['message' => 'Operation Successful !', 'filename' => $fileName, 'no_resi_bayar_kas' => $request->no_resi_bayar_kas_edit,  'id_permohonan' => $request->id_permohonan_edit, 'tanggal_pembayaran_kas' => $request->tanggal_pembayaran_kas_edit]);
    }

}
