<?php

namespace App\Http\Controllers\Pemohon;

use App\Models\User;
use Twilio\Rest\Client;
use App\Models\ModelUmum;
use App\Models\Permohonan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

        $permohonan['data'] = ModelUmum::getDataPengajuanCa()->where('id', Auth::user()->id)->where('jenis_dana', 'Chartered Accountant');
        return response()->json($permohonan);
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
}
