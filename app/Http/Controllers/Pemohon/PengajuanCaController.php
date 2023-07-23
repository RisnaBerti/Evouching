<?php

namespace App\Http\Controllers\Pemohon;

use App\Models\User;
use Twilio\Rest\Client;
use App\Models\ModelUmum;
use App\Models\Permohonan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DetailCa;
use App\Models\PengajuanCA;
use Illuminate\Support\Facades\Auth;

class PengajuanCaController extends Controller
{
    function index()
    {
        $permohonan = ModelUmum::datapermohonandana()->where('id', Auth::user()->id);
        return view('pemohon.pengajuan-ca', [
            'title' => 'Pengajuan CA',
            'active' => 'pengajuan-ca',
            'permohonan' => $permohonan
        ]);
    }

    public function get()
    {
        // $permohonan['data'] = Permohonan::join('users', 'users.id', '=', 'tb_permohonan.id')
        // ->where('tb_permohonan.id', Auth::user()->id)
        // ->where('jenis_dana', 'Pengajuan CA')
        // ->get(['users.name', 'users.jabatan', 'users.divisi', 'tb_permohonan.*']);

        // $permohonan['data'] = ModelUmum::getDataPengajuanCa()->where('id', Auth::user()->id)->where('jenis_dana', 'Chartered Accountant');
        $data['data'] = Permohonan::leftJoin('tb_ca', 'tb_ca.id_permohonan', '=', 'tb_permohonan.id_permohonan')
            ->leftJoin('detail_ca', 'detail_ca.id_ca', '=', 'tb_ca.id_ca')
            ->join('users', 'users.id', '=', 'tb_permohonan.id')
            ->where('tb_permohonan.jenis_dana', '=', 'Chartered Accountant')
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
                'tb_permohonan.status_permohonan',
                'tb_permohonan.terbilang',
                'tb_permohonan.tanggal_permohonan',
                'detail_ca.bukti_detail_ca',
                'detail_ca.nominal',
                'tb_ca.tanggal_penerimaan_ca',
                'tb_ca.nominal_terpakai'
            ]);

        return response()->json($data);
    }

    //fungsi add
    public function add(Request $request)
    {
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
                'ttd_pemohonan' => '1',
                'ttd_manajer' => '0',
                'ttd_pemeriksa' => '0',
                'ttd_bendahara' => '0'
            ]
        );

        PengajuanCA::create(
            [
                'id_ca' => str_replace('-', '', Str::uuid()),
                'id_permohonan' => $id_permohonan,
                'no_resi_ca' => '0',
                'tanggal_penerimaan_ca' => '0',
                'nominal_terpakai' => '0',
                'periode_ca' => '0',
                'bukti_transaksi' => '0'
            ]
        );

        // $sid    = "AC3b9deb3c57406702247d878eddb287da";
        // $token  = "0b3bc836b58827ec36b6ce397249001c";
        // $twilio = new Client($sid, $token);

        // $message = $twilio->messages
        //     ->create(
        //         "whatsapp:+6285155456806", // to
        //         array(
        //             "from" => "whatsapp:+14155238886",
        //             "body" => "==== PERMOHONAN DANA E-VOUCHING ===" . 
        //                     "\nNama                    : " . $user->name . 
        //                     "\nJabatan                 : " . $user->jabatan . 
        //                     "\nDivisi                   : " . $user->divisi . 
        //                     "\nNo Resi                 : " . $request->no_resi_ajuan . 
        //                     "\nTanggal Permohonan      : " . $request->tanggal_permohonan .
        //                     "\nTotal Dana Yang Diajukan: " . $request->total_dana_ajuan . 
        //                     "\nKeterangan: " . $request->keterangan_permohonan . 
        //                     "\nTerimakasih" . 
        //                     "\n=============================="
        //         )
        //     );

        return "success";
    }

    public function getmax3()
    {
        $maxValue = Permohonan::max('no_resi_ajuan');

        if ($maxValue == null) {
            $maxValue = 0;
        }
        return response()->json($maxValue);
    }


    //fungsi edit pembayaran bank
    public function upload_struk(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:png,jpg,jpeg|max:8048',
        ]);

        $ic = $request->id_ca;

        $fileName = $ic . '.' . $request->file->extension();
        $request->file->move(public_path('bukti/ca'), $fileName);

        return response()->json(['message' => 'Operation Successful !', 'filename' => $fileName, 'id_ca' => $request->id_ca, 'nominal' => $request->nominal]);
    }

    public function ubah_struk(Request $request)
    {

        $ca = DetailCa::where('id_ca', $request->id_ca)->first();

        if ($ca != null) {
            $update =  DetailCa::where('id_ca', $request->id_ca)
                ->update([
                    'nominal' => $request->nominal,
                    'bukti_detail_ca' => $request->bukti_transaksi
                ]);

            if ($update) {
                return response()->json(['message' => 'success']);
            } else {
                return response()->json(['message' => 'failed']);
            }
        } else {
            $insert = DetailCa::create(
                [
                    'id_detail_ca' => str_replace('-', '', Str::uuid()),
                    'id_ca' => $request->id_ca,
                    'nominal' => $request->nominal,
                    'bukti_detail_ca' => $request->bukti_transaksi
                ]
            );

            if ($insert) {
                return response()->json(['message' => 'success']);
            } else {
                return response()->json(['message' => 'failed']);
            }
        }
    }
}
