<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;

use Twilio\Rest\Client;
use App\Models\Permohonan;
use App\Models\PengajuanCA;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\DetailCa;
use Illuminate\Support\Facades\Auth;

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

    public function add(Request $request)
    {
        // $request->validate([
        //     'no_resi_ajuan' => 'required',
        //     'tanggal_permohonan' => 'required',
        //     'terbilang' => 'required',
        // ]);

        $user = User::findOrFail(Auth::user()->id);
        $id_permohonan = str_replace('-', '', Str::uuid());

        Permohonan::create(
            [
                $id = Auth::user()->id,
                'id_permohonan' => $id_permohonan,
                'id' => ($id),
                'no_resi_ajuan' => $request->no_resi_ajuan,
                'tanggal_permohonan' => $request->tanggal_permohonan,
                'harga_satuan' => $request->harga_satuan,
                'jumlah_satuan' => $request->jumlah_satuan,
                'total_dana_ajuan' => $request->total_dana_ajuan,
                'nominal_acc' => '0',
                'keterangan_permohonan' => $request->keterangan_permohonan,
                'terbilang' => $request->terbilang,
                'jenis_dana' => 'Chartered Accountant',
                'status_permohonan' => '0',
                'ttd_pemohon' => '1',
                'ttd_manajer' => '0',
                'ttd_pemeriksa' => '0',
                'ttd_bendahara' => '0',
                'komentar' => '0',
            ]
        );

        return "success";
    }

    public function get()
    {
        // $data['data'] = Permohonan::join('users', 'users.id', '=', 'tb_permohonan.id')
        //     ->join('tb_ca', 'tb_ca.id_permohonan', '=', 'tb_permohonan.id_permohonan')
        //     ->where('tb_permohonan.jenis_dana', '=', 'Chartered Accountant')
        //     ->get([
        //         'users.id', 
        //         'users.name', 
        //         'users.jabatan', 
        //         'users.divisi', 
        //         'tb_permohonan.id_permohonan',  
        //         'tb_ca.id_ca', 
        //         'tb_permohonan.nominal_acc', 
        //         'tb_permohonan.total_dana_ajuan', 
        //         'tb_permohonan.keterangan_permohonan', 
        //         'tb_permohonan.terbilang', 
        //         'tb_permohonan.tanggal_permohonan', 
        //         'tb_ca.bukti_transaksi', 
        //         'tb_ca.tanggal_penerimaan_ca', 
        //         'tb_ca.nominal_terpakai'
        //     ]);

        $data['data'] = Permohonan::leftJoin('tb_ca', 'tb_ca.id_permohonan', '=', 'tb_permohonan.id_permohonan')
            // ->leftJoin('detail_ca', 'detail_ca.id_ca', '=', 'tb_ca.id_ca')
            ->leftJoin('users', 'users.id', '=', 'tb_permohonan.id')
            ->join('detail_ca', 'detail_ca.id_ca', '=', 'tb_ca.id_ca')
            ->where('tb_permohonan.jenis_dana', '=', 'Chartered Accountant')
            ->where('tb_permohonan.status_permohonan', '=', '3')
            ->get([
                'users.id',
                'users.name',
                'users.jabatan',
                'users.divisi',
                'tb_permohonan.id_permohonan',
                'tb_ca.id_ca',
                'tb_permohonan.nominal_acc',
                'tb_permohonan.total_dana_ajuan',
                'tb_permohonan.keterangan_permohonan',
                'tb_permohonan.terbilang',
                'tb_permohonan.tanggal_permohonan',
                'tb_ca.bukti_transaksi',
                'tb_ca.tanggal_penerimaan_ca',
                'tb_ca.nominal_terpakai'
            ]);

        return $data;
    }

    public function getNominalTerpakai($id_ca)
    {
        $data = DetailCa::where('id_ca', $id_ca)->sum('nominal');
        return response()->json($data);
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
            'file' => 'required|mimes:pdf|max:8048',
        ]);

        $ip = $request->id_permohonan;
        // $ic = $request->id_ca;


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
            'file_edit' => 'required|mimes:pdf|max:8048',
        ]);

        $ip = $request->id_permohonan_edit;

        $fileName = $ip . '.' . $request->file_edit->extension();
        $request->file_edit->move(public_path('bukti/ca'), $fileName);

        return response()->json([
            'message' => 'Operation Successful !',
            'filename' => $fileName,
            'id_ca' => $request->id_ca_edit,
            'no_resi_ca' => $request->no_resi_ca_edit,
            'id_permohonan' => $request->id_permohonan_edit,
            'tanggal_penerimaan_ca' => $request->tanggal_penerimaan_ca_edit,
            'nominal_terpakai' => $request->nominal_terpakai_edit
        ]);
    }
}
