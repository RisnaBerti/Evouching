<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permohonan;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PembayaranBank;
use App\Models\PenerimaanBank;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class BankController extends Controller
{
    public function index()
    {
        return view('admin.penerimaan-bank', [
            'title' => 'Bank',
            'active' => 'Bank'
        ]);
    }

    public function pembayaran_bank()
    {
        return view('admin.pembayaran-bank', [
            'title' => 'Pembayaran Bank',
            'active' => 'Pembayaran Bank'
        ]);
    }

    public function getmax()
    {
        $maxValue = PenerimaanBank::max('no_resi_terima_bank');

        if ($maxValue == null) {
            $maxValue = 0;
        }
        return response()->json($maxValue);
    }

    //fungsi get data penerimaan bank
    public function get_penerimaan_bank()
    {
        $data['data'] = Permohonan::join('users', 'users.id', '=', 'tb_permohonan.id')
            ->join('tb_penerimaan_bank', 'tb_penerimaan_bank.id_permohonan', '=', 'tb_permohonan.id_permohonan')
            ->where('tb_permohonan.jenis_dana', '=', 'Penerimaan Bank')
            ->get(['users.name', 'users.jabatan', 'users.divisi', 'tb_permohonan.*', 'tb_penerimaan_bank.*']);
        return response()->json($data);
    }

    function ubah_penerimaan_bank(Request $request)
    {
        PenerimaanBank::where('id_permohonan', $request->id_permohonan)
            ->update([
                'bukti_transaksi' => $request->bukti_transaksi,
                'no_resi_terima_bank' => $request->no_resi_terima_bank,
                'tanggal_penerimaan_bank' => $request->tanggal_penerimaan_bank
            ]);

        return response()->json(['message' => 'success']);
    }

    //fungsi edit penerimaan bank
    public function edit_penerimaan_bank(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png|max:5048',
        ]);

        $ip = $request->id_permohonan;

        $fileName = $ip . '.' . $request->file->extension();
        $request->file->move(public_path('bukti'), $fileName);

        return response()->json(['message' => 'Operation Successful !', 'filename' => $fileName, 'no_resi_terima_bank' => $request->no_resi_terima_bank,  'id_permohonan' => $request->id_permohonan, 'tanggal_penerimaan_bank' => $request->tanggal_penerimaan_bank]);
    }

    //fungsi get penerimaan bank by id
    public function get_penerimaan_bank_id(Request $request)
    {
        $data = PenerimaanBank::where('id_permohonan', $request->id_permohonan)->first();
        return response()->json($data);
    }

    public function ubah_penerimaan_bank_id(Request $request)
    {
        PenerimaanBank::where('id_permohonan', $request->id_permohonan)
            ->update([
                'bukti_transaksi' => $request->bukti_transaksi_edit,
                'no_resi_terima_bank' => $request->no_resi_terima_bank_edit,
                'tanggal_penerimaan_bank' => $request->tanggal_penerimaan_bank_edit
            ]);

        return response()->json(['message' => 'success']);
    }

    public function edit_penerimaan_bank_id(Request $request)
    {
        $request->validate([
            'file_edit' => 'required|mimes:jpg,jpeg,png|max:5048',
        ]);

        $ip = $request->id_permohonan_edit;

        $fileName = $ip . '.' . $request->file_edit->extension();
        $request->file_edit->move(public_path('bukti'), $fileName);

        return response()->json(['message' => 'Operation Successful !', 'filename' => $fileName, 'no_resi_terima_bank' => $request->no_resi_terima_bank_edit,  'id_permohonan' => $request->id_permohonan_edit, 'tanggal_penerimaan_bank' => $request->tanggal_penerimaan_bank_edit]);
    }


    //  ====== PEMBAYARAN BANK ======  //

    public function getmax2()
    {

        $maxValue = PembayaranBank::max('no_resi_bayar_bank');

        if ($maxValue == null) {
            $maxValue = 0;
        }
        return response()->json($maxValue);
    }

    //fungsi get data pembayaran bank
    public function get_pembayaran_bank()
    {
        $data['data'] = Permohonan::join('users', 'users.id', '=', 'tb_permohonan.id')
            ->join('tb_pembayaran_bank', 'tb_pembayaran_bank.id_permohonan', '=', 'tb_permohonan.id_permohonan')
            ->where('tb_permohonan.jenis_dana', '=', 'Pembayaran Bank')
            ->get(['users.name', 'users.jabatan', 'users.divisi', 'tb_permohonan.*', 'tb_pembayaran_bank.*']);
        return response()->json($data);
    }

    //fungsi ubah pembayaran bank
    function ubah_pembayaran_bank(Request $request)
    {
        PembayaranBank::where('id_permohonan', $request->id_permohonan)
            ->update([
                'bukti_transaksi' => $request->bukti_transaksi,
                'no_resi_bayar_bank' => $request->no_resi_bayar_bank,
                'tanggal_pembayaran_bank' => $request->tanggal_pembayaran_bank
            ]);

        return response()->json(['message' => 'success']);
    }

    //fungsi edit pembayaran bank
    public function edit_pembayaran_bank(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png|max:5048',
        ]);

        $ip = $request->id_permohonan;

        $fileName = $ip . '.' . $request->file->extension();
        $request->file->move(public_path('bukti'), $fileName);

        return response()->json(['message' => 'Operation Successful !', 'filename' => $fileName, 'no_resi_bayar_bank' => $request->no_resi_bayar_bank,  'id_permohonan' => $request->id_permohonan, 'tanggal_pembayaran_bank' => $request->tanggal_pembayaran_bank]);
    }

    //fungsi get pembayaran bank by id
    public function get_pembayaran_bank_id(Request $request)
    {
        $data = PembayaranBank::where('id_permohonan', $request->id_permohonan)->first();
        return response()->json($data);
    }

    public function ubah_pembayaran_bank_id(Request $request)
    {
        PembayaranBank::where('id_permohonan', $request->id_permohonan)
            ->update([
                'bukti_transaksi' => $request->bukti_transaksi_edit,
                'no_resi_bayar_bank' => $request->no_resi_bayar_bank_edit,
                'tanggal_pembayaran_bank' => $request->tanggal_pembayaran_bank_edit
            ]);

        return response()->json(['message' => 'success']);
    }

    public function edit_pembayaran_bank_id(Request $request)
    {
        $request->validate([
            'file_edit' => 'required|mimes:jpg,jpeg,png|max:5048',
        ]);

        $ip = $request->id_permohonan_edit;

        $fileName = $ip . '.' . $request->file_edit->extension();
        $request->file_edit->move(public_path('bukti'), $fileName);

        return response()->json(['message' => 'Operation Successful !', 'filename' => $fileName, 'no_resi_bayar_bank' => $request->no_resi_bayar_bank_edit,  'id_permohonan' => $request->id_permohonan_edit, 'tanggal_pembayaran_bank' => $request->tanggal_pembayaran_bank_edit]);
    }
}
