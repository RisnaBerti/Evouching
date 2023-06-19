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
            ->get(['users.id', 'users.name', 'users.jabatan', 'users.divisi', 'tb_permohonan.id_permohonan', 'tb_ca.id_ca', 'tb_permohonan.nominal_acc', 'tb_permohonan.keterangan_permohonan', 'tb_ca.bukti_transaksi', 'tb_ca.periode_ca', 'tb_ca.nominal_terpakai']);

        return $data;
    }

    function edit_upload_pembayaran(Request $request)
    {
        PengajuanCA::where('id_ca', $request->id_ca)
            ->update([
                'bukti_transaksi' => $request->bukti_transaksi,
                'no_resi_ca' => $request->no_resi_ca,
                'tanggal_penerimaan_ca' => $request->tanggal_penerimaan_ca,
                'nominal_terpakai' => $request->nominal_terpakai
            ]);

        return response()->json(['message' => 'success']);
    }

    //fungsi upload bukti transaksi
    public function upload_pembayaran(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png|max:5048',
        ]);

        $ip = $request->id_permohonan;

        $fileName = $ip . '.' . $request->file->extension();
        $request->file->move(public_path('bukti/ca'), $fileName);

        return response()->json([
            'message' => 'Operation Successful !',
            'filename' => $fileName,
            'no_resi_ca' => $request->no_resi_ca,
            'id_permohonan' => $request->id_permohonan,
            'tanggal_penerimaan_ca' => $request->tanggal_penerimaan_ca,
            'nominal_terpakai' => $request->nominal_terpakai,
            'id_ca' => $request->id_ca
        ]);
    }

    //fungsi get data id
    public function get_id(Request $request)
    {
        $data = PengajuanCA::where('id_ca', $request->id_ca)->first();
        return response()->json($data);
    }

    public function edit_upload_pembayaran_id(Request $request)
    {
        PengajuanCA::where('id_ca', $request->id_ca)
            ->update([
                'bukti_transaksi' => $request->bukti_transaksi_edit,
                'no_resi_ca' => $request->no_resi_ca_edit,
                'tanggal_penerimaan_ca' => $request->tanggal_penerimaan_ca_edit,
                'nominal_terpakai' => $request->nominal_terpakai_edit
            ]);

        return response()->json(['message' => 'success']);
    }

    public function upload_pembayaran_id(Request $request)
    {
        $request->validate([
            'file_edit' => 'required|mimes:jpg,jpeg,png|max:5048',
        ]);

        $ip = $request->id_permohonan_edit;

        $fileName = $ip . '.' . $request->file_edit->extension();
        $request->file_edit->move(public_path('bukti/ca'), $fileName);

        return response()->json(['message' => 'Operation Successful !', 
        'filename' => $fileName, 
        'id_ca' => $request->id_ca_edit, 
        'no_resi_ca' => $request->no_resi_ca_edit,  
        'id_permohonan' => $request->id_permohonan_edit, 
        'tanggal_penerimaan_ca' => $request->tanggal_penerimaan_ca_edit, 
        'nominal_terpakai' => $request->nominal_terpakai_edit]);
    }
}
