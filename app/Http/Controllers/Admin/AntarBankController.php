<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PembayaranKas;
use App\Models\PembayaranBank;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AntarBankController extends Controller
{
    public function index()
    {
        return view(
            'admin.penerimaan-antar-bank',
            [
                'title' => 'Penerimaan Antar Bank',
                'menu' => 'penerimaan-antar-bank'
            ]
        );
    }

    public function pembayaran_antar_bank()
    {
        return view(
            'admin.pembayaran-antar-bank',
            [
                'title' => 'Pembayaran Antar Bank',
                'menu' => 'pembayaran-antar-bank'
            ]
        );
    }

    public function pembayaran_antar_bank_add(Request $request)
    {
        PembayaranBank::create(
            [
                // $id_permohonan = str_replace('-', '', Str::uuid()),
                // $id = Auth::user()->id,
                // 'id_permohonan' => $id_permohonan,
                // 'id' => ($id),
                $id_pembayaran_antar_bank = str_replace('-', '', Str::uuid()),
                'id_pembayaran_antar_bank' => $id_pembayaran_antar_bank,
                'no_resi_ajuan' => $request->no_resi_ajuan,
                'tanggal_mutasi' => $request->tanggal_mutasi,
                'jenis_dana' => $request->jenis_dana,
                'nama_mutasi' => $request->nama_mutasi,
                'asal_bank' => $request->asal_bank,
                'bank_tujuan' => $request->bank_tujuan,
                'total_dana_ajuan' => $request->total_dana_ajuan,
                'nominal_acc' => $request->nominal_acc,
                'keterangan_permohonan' => '0',
                'terbilang' => $request->terbilang,
                'status_permohonan' => '0'
            ]
        );

        // return "success";
        return redirect()->route('pembayaran-antarbank')->with(['success' => ' berhasil ditambahkan']);
    }

    public function pembayaran_antar_bank_edit(Request $request)
    {

        PembayaranBank::create(
            [
                'id_pembayaran_antar_bank' => str_replace('-', '', Str::uuid()),
                'no_resi_bayar' => $request->no_resi_bayar,
                'tanggal_pembayaran_bank' => $request->tanggal_pembayaran_bank,
                'bukti_transaksi' => $request->bukti_transaksi,
            ]
        );
    }
}
