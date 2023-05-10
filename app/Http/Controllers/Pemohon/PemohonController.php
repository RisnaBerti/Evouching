<?php

namespace App\Http\Controllers\Pemohon;

use App\Models\Permohonan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Str;

class PemohonController extends Controller
{
    public function index()
    {
        return view('pemohon.dashboard-pemohon', [
            'title' => 'Dashboard',
            'active' => 'dashboard-pemohon'
        ]);
    }

    public function permohonan_pemohon()
    {
        return view('pemohon.permohonan-dana', [
            'title' => 'Permohonan',
            'active' => 'permohonan'
        ]);
    }

    public function add(Request $request)
    {
        //fungsi add permohonan

        $request->validate([
            'no_resi_ajuan' => 'required',
            'tanggal_permohonan' => 'required',
            'harga_satuan' => 'required|numeric',
            'jumlah_satuan' => 'required|numeric',
            'total_harga' => 'required|numeric',
            'nominal_acc' => 'required|numeric',
            'terbilang' => 'required',
        ]);

        Permohonan::create(
            [
                'id_permohonan' => str_replace('-', '', Str::uuid()),
                'id' => Auth::user()->id,
                'no_resi_ajuan' => $request->no_resi_ajuan,
                'tanggal_permohonan' => $request->tanggal_permohonan,
                'harga_satuan' => $request->harga_satuan,
                'jumlah_satuan' => $request->jumlah_satuan,
                'total_harga' => $request->total_harga,
                'nominal_acc' => $request->nominal_acc,
                'keterangan_permohonan' => '0',
                'terbilang' => $request->terbilang,
                'status_permohonan' => '0',
            ]
        );
        return "success";
        // return 'success'


        // $user = User::find($request->id);
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->no_hp = $request->no_hp;
        // $user->divisi = $request->divisi;
        // $user->jabatan = $request->jabatan;
        // $user->alamat =  $request->alamat;
        // $user->update();

        // Alert::success('Success', 'User berhasil diubah');

    }
}
