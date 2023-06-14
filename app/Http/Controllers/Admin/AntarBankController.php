<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PembayaranKas;
use App\Models\PembayaranBank;
use App\Http\Controllers\Controller;
use App\Models\PembayaranAntarBank;
use App\Models\PenerimaanAntarBank;
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

    //fungsi getmax
    public function getmax()
    {
        $maxValue = PenerimaanAntarBank::max('no_resi_penerimaan_antar_bank');

        if ($maxValue == null) {
            $maxValue = 0;
        }

        return response()->json($maxValue);
    }

    //fungsi get penerimaan antar bank
    public function get_penerimaan_antar_bank()
    {
        $data['data'] = PenerimaanAntarBank::all();
        return response()->json($data);
    }

    public function penerimaan_antar_bank_add(Request $request)
    {
        $request->validate(
            [
                'no_resi_penerimaan_antar_bank' => 'required',
                'tanggal_penerimaan_antar_bank' => 'required',
                'total_dana' => 'required',
                'terbilang' => 'required',
                'keperluan' => 'required',
            ]
        );

        PenerimaanAntarBank::create(
            [
                'id_penerimaan_antar_bank' => str_replace('-', '', Str::uuid()),
                'no_resi_penerimaan_antar_bank' => $request->no_resi_penerimaan_antar_bank,
                'tanggal_penerimaan_antar_bank' => $request->tanggal_penerimaan_antar_bank,
                'total_dana' => $request->total_dana,
                'terbilang' => $request->terbilang,
                'keperluan' => $request->keperluan
            ]
        );

        // return "success";
        return redirect()->route('penerimaan-antarbank')->with(['success' => ' berhasil ditambahkan']);
    }

    public function penerimaan_antar_bank_edit(Request $request)
    {
        //edit data
        $penerimaan_antar_bank = PenerimaanAntarBank::find($request->id_penerimaan_antar_bank_edit);
        $penerimaan_antar_bank->no_resi_penerimaan_antar_bank = $request->no_resi_penerimaan_antar_bank_edit;
        $penerimaan_antar_bank->tanggal_penerimaan_antar_bank = $request->tanggal_penerimaan_antar_bank_edit;
        $penerimaan_antar_bank->total_dana = $request->total_dana_edit;
        $penerimaan_antar_bank->terbilang = $request->terbilang_edit;
        $penerimaan_antar_bank->keperluan = $request->keperluan_edit;
        $res = $penerimaan_antar_bank->update();

        if ($res) {
            echo "success";
        } else {
            echo "false";
        }

    }

    //fungsi delete penerimaan antar bank
    public function penerimaan_antar_bank_delete(Request $request)
    {
        $penerimaan_antar_bank = PenerimaanAntarBank::find($request->id_penerimaan_antar_bank);
        $res = $penerimaan_antar_bank->delete();

        if ($res) {
            echo "success";
        } else {
            echo "false";
        }
    }

    // ======== Pembayaran Antar Bank =========
    public function getmax2()
    {
        $maxValue = PembayaranAntarBank::max('no_resi_pembayaran_antar_bank');

        if ($maxValue == null) {
            $maxValue = 0;
        }

        return response()->json($maxValue);
    }

    //fungsi get penerimaan antar bank
    public function get_pembayaran_antar_bank()
    {
        $data['data'] = PembayaranAntarBank::all();
        return response()->json($data);
    }

    public function pembayaran_antar_bank_add(Request $request)
    {
        $request->validate(
            [
                'no_resi_pembayaran_antar_bank' => 'required',
                'tanggal_pembayaran_antar_bank' => 'required',
                'total_dana' => 'required',
                'terbilang' => 'required',
                'keperluan' => 'required',
            ]
        );

        PembayaranAntarBank::create(
            [
                'id_pembayaran_antar_bank' => str_replace('-', '', Str::uuid()),
                'no_resi_pembayaran_antar_bank' => $request->no_resi_pembayaran_antar_bank,
                'tanggal_pembayaran_antar_bank' => $request->tanggal_pembayaran_antar_bank,
                'total_dana' => $request->total_dana,
                'terbilang' => $request->terbilang,
                'keperluan' => $request->keperluan
            ]
        );

        // return "success";
        return redirect()->route('pembayaran-antarbank')->with(['success' => ' berhasil ditambahkan']);
    }

    public function pembayaran_antar_bank_edit(Request $request)
    {
        //edit data
        // $request->validate(
        //     [
        //         'no_resi_pembayaran_antar_bank' => 'required',
        //         'tanggal_pembayaran_antar_bank' => 'required',
        //         'total_dana' => 'required',
        //         'terbilang' => 'required',
        //         'keperluan' => 'required',
        //     ]
        // );

        $pembayaran_antar_bank = PembayaranAntarBank::find($request->id_pembayaran_antar_bank_edit);
        $pembayaran_antar_bank->no_resi_pembayaran_antar_bank = $request->no_resi_pembayaran_antar_bank_edit;
        $pembayaran_antar_bank->tanggal_pembayaran_antar_bank = $request->tanggal_pembayaran_antar_bank_edit;
        $pembayaran_antar_bank->total_dana = $request->total_dana_edit;
        $pembayaran_antar_bank->terbilang = $request->terbilang_edit;
        $pembayaran_antar_bank->keperluan = $request->keperluan_edit;
        $res = $pembayaran_antar_bank->update();

        if ($res) {
            echo "success";
        } else {
            echo "false";
        }
    }

    //fungsi delete pembayaran antar bank
    public function pembayaran_antar_bank_delete(Request $request)
    {
        $pembayaran_antar_bank = PembayaranAntarBank::find($request->id_pembayaran_antar_bank);
        $res = $pembayaran_antar_bank->delete();

        if ($res) {
            echo "success";
        } else {
            echo "false";
        }
    }
}
