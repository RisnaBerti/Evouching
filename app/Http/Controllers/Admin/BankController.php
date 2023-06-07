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

    //fungsi edit penerimaan bank
    public function edit_penerimaan_bank(Request $request)
    {
        $request->validate([

            'file' => 'required|mimes:jpg,jpeg,png|max:5048',

        ]);

        $fileName = $request->id_permohonan . '.' . $request->file->extension();
        $request->file->move(public_path('bukti'), $fileName);

        PenerimaanBank::create(
            [
                $id = Auth::user()->id,
                'id_penerimaan_kas' => str_replace('-', '', Str::uuid()),
                'id_permohonan' => $request->id_permohonan,
                'id' => ($id),
                'no_resi_terima_bank' => $request->no_resi_terima_bank,
                'tanggal_penerimaan_bank' => $request->tanggal_penerimaan_bank,
                'bukti_transaksi' => $fileName
            ]
        );

        return Redirect::back()->with('message', 'Operation Successful !');
    }
    //  ----------------------------------------------------------------

    public function getmax2()
    {

        $maxValue = PembayaranBank::max(' no_resi_bayar_bank ');

        if ($maxValue == null) {
            $maxValue = 0;
        }
        return response()->json($maxValue);
    }

    //fungsi get data pembayaran kas
    public function get_pembayaran_bank()
    {
        $data['data'] = Permohonan::join('users', 'users.id', '=', 'tb_permohonan.id')
            ->join('tb_pembayaran_bank', 'tb_pembayaran_bank.id_permohonan', '=', 'tb_permohonan.id_permohonan')
            ->where('tb_permohonan.jenis_dana', '=', 'Pembayaran Bank')
            ->get(['users.name', 'users.jabatan', 'users.divisi', 'tb_permohonan.*', 'tb_pembayaran_bank.*']);
        return response()->json($data);
    }

    //fungsi edit pembayaran bank
    public function edit_pembayaran_bank(Request $request)
    {
        $request->validate([

            'file' => 'required|mimes:jpg,jpeg,png|max:5048',

        ]);

        $fileName = $request->id_permohonan . '.' . $request->file->extension();
        $request->file->move(public_path('bukti'), $fileName);

        PembayaranBank::create(
            [
                $id = Auth::user()->id,
                'id_penerimaan_bank' => str_replace('-', '', Str::uuid()),
                'id_permohonan' => $request->id_permohonan,
                'id' => ($id),
                'no_resi_bayar_bank' => $request->no_resi_bayar_bank,
                'tanggal_pembayaran_bank ' => $request->tanggal_pembayaran_bank ,
                'bukti_transaksi' => $fileName
            ]
        );

        return Redirect::back()->with('message', 'Operation Successful !');
    }
}
