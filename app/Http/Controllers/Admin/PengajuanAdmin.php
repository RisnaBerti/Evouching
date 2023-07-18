<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permohonan;


use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PembayaranKas;
use App\Models\PenerimaanKas;
use App\Models\PembayaranAntarBank;
use App\Models\PembayaranBank;
use App\Models\PenerimaanBank;
use App\Models\PengajuanCA;
use App\Models\Saldo;
use Twilio\Rest\Client;
use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use App\Models\Penerimaan;
use Illuminate\Support\Facades\Auth;
use DB; //import fungsi query builder

class PengajuanAdmin extends Controller
{
    public function index()
    {
        $data = Permohonan::all();
        return view(
            'admin/pengajuan-admin',
            [
                'title' => 'Permohonan Dana',
                'active' => 'Permohonan Dana',
                'data' => $data
            ]
        );
    }

    //fungsi get data
    public function get()
    {
        // $return['data'] = Permohonan::all();

        $return['data']  = Permohonan::join('users', 'users.id', '=', 'tb_permohonan.id')
            ->get(['users.*', 'tb_permohonan.*']);

        return response()->json($return);
    }

    //fungsi edit data
    public function edit(Request $request)
    {

        $permohonan = Permohonan::findOrFail($request->id_permohonan);
        $permohonan->nominal_acc = $request->nominal_acc;
        $permohonan->status_permohonan = '1';
        $permohonan->jenis_dana = $request->jenis_dana;
        $permohonan->komentar = $request->komentar;
        $permohonan->status_permohonan = '1';
        $permohonan->ttd_bendahara = '1';
        $permohonan->update();

        if ($permohonan->jenis_dana == 'Penerimaan Kas' || $permohonan->jenis_dana == 'Penerimaan Bank') {
            Penerimaan::create(
                [
                    'id_penerimaan' => str_replace('-', '', Str::uuid()),
                    'id_permohonan' => $request->id_permohonan,
                    'no_resi_terima_bank' => '0',
                    'tanggal_penerimaan_bank' => '0',
                    'bukti_penerimaan_bank' => '0',
                    'no_resi_terima_kas' => '0',
                    'tanggal_penerimaan_kas' => '0',
                    'bukti_penerimaan_kas' => '0'
                ]
            );
        } else if ($permohonan->jenis_dana == 'Pembayaran Kas' || $permohonan->jenis_dana == 'Pembayaran Bank') {
            Pembayaran::create(
                [
                    'id_pembayaran' => str_replace('-', '', Str::uuid()),
                    'id_permohonan' => $request->id_permohonan,
                    'no_resi_bayar_kas'=> '0',
                    'tanggal_pembayaran_kas'=> '0',
                    'bukti_pembayaran_kas'=> '0',
                    'no_resi_bayar_bank'=> '0',
                    'tanggal_pembayaran_bank'=> '0',
                    'bukti_pembayaran_bank' => '0'
                ]
            );
        } else {
            PengajuanCA::create(
                [
                    'id_ca' => str_replace('-', '', Str::uuid()),
                    'id_permohonan' => $request->id_permohonan,
                    'no_resi_ca' => '0',
                    'tanggal_penerimaan_ca' => '0',
                    'nominal_terpakai' => '0',
                    'bukti_transaksi' => '0'
                ]
            );
        }

        $data = Permohonan::join('users', 'users.id', '=', 'tb_permohonan.id')
            ->where('tb_permohonan.id_permohonan', $request->id_permohonan)
            ->get(['users.*', 'tb_permohonan.*'])->first();

        $sid    = "AC3b9deb3c57406702247d878eddb287da";
        $token  = "0b3bc836b58827ec36b6ce397249001c";
        $twilio = new Client($sid, $token);

        $message = $twilio->messages
            ->create(
                "whatsapp:+6285155456806", // to
                array(
                    "from" => "whatsapp:+14155238886",
                    "body" => "*PERMOHONAN DANA VOCHING*" .
                        "\n============================" .
                        "\nNama                     : " . $data->name .
                        "\nJabatan                  : " . $data->jabatan .
                        "\nDivisi                   : " . $data->divisi .
                        "\nNo Resi                  : " . $data->no_resi_ajuan .
                        "\nTotal Dana Yang Diajukan : " . $data->total_dana_ajuan .
                        "\nKeterangan               : " . $data->keterangan_permohonan .
                        "\n*Total Dana Di ACC        :*" . $request->nominal_acc.
                        "\nPERMOHONAN SUDAH DISETUJUI BENDAHARA" .
                        "\n*Terima Kasih*" .
                        "\n============================"

                )
            );

        return "success";
    }

    // public function test (Request $request)
    // {
    //     $data = Permohonan::join('users', 'users.id', '=', 'tb_permohonan.id')
    //         // ->where('tb_permohonan.id', $request->id_permohonan)
    //         ->get(['users.*', 'tb_permohonan.*'])->first();

    //     echo $data->jabatan;

    // }

    public function menolak(Request $request)
    {
        $permohonan = Permohonan::findOrFail($request->id_permohonan);
        $permohonan->status_permohonan = '4';
        $permohonan->komentar = $request->komentar;
        $permohonan->ttd_bendahara = '1';
        $permohonan->update();

        return "success";
    }


    public function get_saldo()
    {
        $bulan = date('m');
        $tahun = date('Y');

        $bank = PembayaranAntarBank::where('bulan', $bulan)
            ->where('tahun', $tahun)
            ->first();

        return response()->json($bank);
    }

    public function update_saldo(Request $request)
    {
        $permohonan = PembayaranAntarBank::findOrFail($request->id_pembayaran_antar_bank);
        $permohonan->sisa_saldo = $request->sisa_saldo;
        $permohonan->update();

        return "success";
    }

    public function update_saldo_akhir(Request $request)
    {
        Saldo::where('id_pembayaran_antar_bank', $request->id_pembayaran_antar_bank)
            ->update([
                'saldo_akhir' => $request->sisa_saldo,
            ]);

        // $saldo = Saldo::find($request->id_pembayaran_antar_bank);
        // $saldo->saldo_akhir = $request->sisa_saldo;
        // $saldo->update();

        return "success";
    }
}
