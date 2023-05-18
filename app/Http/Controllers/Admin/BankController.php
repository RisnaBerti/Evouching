<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permohonan;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PembayaranBank;
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

    //fungsi get data penerimaan bank
    public function get_penerimaan_bank()
    {
        $data['data'] = Permohonan::join('users', 'users.id', '=', 'tb_permohonan.id')
            ->where('tb_permohonan.jenis_dana', '=', 'Penerimaan Bank')
            ->get(['users.name', 'users.jabatan', 'users.divisi', 'tb_permohonan.*']);
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

        // PenerimaanKas::create(
        //     [
        //         $id = Auth::user()->id,
        //         'id_penerimaan_kas' => str_replace('-', '', Str::uuid()),
        //         'id_permohonan' => $request->id_permohonan,
        //         'id' => ($id),
        //         'no_resi_terima_kas' => '0',
        //         'tanggal_penerimaan_kas' => $request->tanggal_penerimaan_kas,
        //         'bukti_transaksi' => $fileName,
        //         'status' => '1'
        //     ]
        // );

        return Redirect::back()->with('message', 'Operation Successful !');
    }

    //fungsi get data pembayaran kas
    public function get_pembayaran_bank()
    {
        $data['data'] = Permohonan::join('users', 'users.id', '=', 'tb_permohonan.id')
            ->where('tb_permohonan.jenis_dana', '=', 'Pembayaran Bank')
            ->get(['users.name', 'users.jabatan', 'users.divisi', 'tb_permohonan.*']);
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
                'id_pembayaran_bank' => str_replace('-', '', Str::uuid()),
                'id_permohonan' => $request->id_permohonan,
                'id' => ($id),
                'no_resi_bayar_bank' => $request->no_resi_bayar_bank,
                'tanggal_penerimaan_kas' => $request->tanggal_penerimaan_kas,
                'bukti_transaksi' => $fileName,
                'status' => '1'
            ]
        );

        return Redirect::back()->with('message', 'Operation Successful !');
    }
}
