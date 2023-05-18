<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Permohonan;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PembayaranKas;
use App\Models\PenerimaanKas;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class KasController extends Controller
{
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


    public function get_penerimaan_kas()
    {

        $data['data'] = Permohonan::join('users', 'users.id', '=', 'tb_permohonan.id')
            ->where('tb_permohonan.jenis_dana', '=', 'Penerimaan Kas')
            ->get(['users.name', 'users.jabatan', 'users.divisi', 'tb_permohonan.*']);

        return $data;
    }

    //fungsi edit penerimaan kas
    public function edit_penerimaan_kas(Request $request)
    {
        $request->validate([

            'file' => 'required|mimes:jpg,jpeg,png|max:5048',

        ]);

        $fileName = $request->id_permohonan . '.' . $request->file->extension();
        $request->file->move(public_path('bukti'), $fileName);

        PenerimaanKas::create(
            [
                $id = Auth::user()->id,
                'id_penerimaan_kas' => str_replace('-', '', Str::uuid()),
                'id_permohonan' => $request->id_permohonan,
                'id' => ($id),
                'no_resi_terima_kas' => '0',
                'tanggal_penerimaan_kas' => $request->tanggal_penerimaan_kas,
                'bukti_transaksi' => $fileName,
                'status' => '1'
            ]
        );

        return Redirect::back()->with('message', 'Operation Successful !');
    }

    //fungsi get data pembayaran kas
    public function get_pembayaran_kas()
    {
    //    $data['data'] = "SELECT users.name, users.jabatan, users.divisi, tb_permohonan.nominal_acc, tb_permohonan.keterangan_permohonan, tb_pembayaran_kas.status
    //     FROM users, tb_permohonan, tb_pembayaran_kas
    //     WHERE users.id=tb_permohonan.id 
    //     AND tb_permohonan.id_permohonan=tb_pembayaran_kas.id_permohonan";

    // $data['data'] = "select 
    // a.name, a.divisi, a.jabatan, b.*,c.* from users a 
    // left join tb_permohonan b on a.id=b.id 
    // left join tb_pembayaran_kas c on b.id_permohonan=c.id_permohonan 
    // where b.jenis_dana='Pembayaran Kas'";
    // return response()->json($data);

        $data['data'] = Permohonan::join('users', 'users.id', '=', 'tb_permohonan.id')
            ->where('tb_permohonan.jenis_dana', '=', 'Pembayaran Kas')
            ->get(['users.name', 'users.jabatan', 'users.divisi', 'tb_permohonan.*']);
        return response()->json($data);

        // $data['data'] = PembayaranKas::join('users', 'users.id', '=', 'tb_pembayaran_kas.id')
        //     ->join('tb_permohonan', 'tb_permohonan.id_permohonan', '=', 'tb_pembayaran_kas.id_permohonan')
        //     ->where('tb_permohonan.jenis_dana', '=', 'Pembayaran Kas')
        //     ->get(['users.name', 'users.jabatan', 'users.divisi', 'tb_permohonan.*', 'tb_pembayaran_kas.*']);
        // return response()->json($data);
    }

    //fungsi edit pembayaran kas
    public function edit_pembayaran_kas(Request $request)
    {

        $request->validate([

            'file' => 'required|mimes:jpg,jpeg,png|max:5048',

        ]);

        $fileName = $request->id_permohonan . '.' . $request->file->extension();
        $request->file->move(public_path('bukti'), $fileName);

        PembayaranKas::create(
            [
                'id_pembayaran_kas' => str_replace('-', '', Str::uuid()),
                'id_permohonan' => $request->id_permohonan,
                'id' =>  Auth::user()->id,
                'no_resi_bayar_kas' => '0',
                'tanggal_pembayaran_kas' => $request->tanggal_pembayaran_kas,
                'bukti_transaksi' => $fileName
            ]
        );

        return Redirect::back()->with('message', 'Operation Successful !');
    }
}
