<?php

namespace App\Http\Controllers\Admin;

use App\Models\Saldo;

use Twilio\Rest\Client;
use App\Models\Pembayaran;
use App\Models\Penerimaan;
use App\Models\Permohonan;
use App\Models\PengajuanCA;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PembayaranKas;
use App\Models\PenerimaanKas;
use App\Models\PembayaranBank;
use App\Models\PenerimaanBank;
use Illuminate\Support\Facades\DB;
use App\Models\PembayaranAntarBank;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        $request->validate( //validasi
            [
                'nominal_acc' => 'required|numeric',
                'jenis_dana' => 'required',
                'komentar' => 'required'
            ]
        );

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
                    'no_resi_bayar_kas' => '0',
                    'tanggal_pembayaran_kas' => '0',
                    'bukti_pembayaran_kas' => '0',
                    'no_resi_bayar_bank' => '0',
                    'tanggal_pembayaran_bank' => '0',
                    'bukti_pembayaran_bank' => '0'
                ]
            );
        } else {
            PengajuanCA::create(
                [
                    'id_ca' => str_replace('-', '', Str::uuid()),
                    'id_permohonan' => $request->id_permohonan,
                    'no_resi_ca' => '0',
                    'tanggal_penerimaan_ca' => '-',
                    'nominal_terpakai' => '0',
                    'bukti_transaksi' => '0'
                ]
            );
        }

        //wabalas itu bisa 62 atau 08

        $user = Permohonan::join('users', 'users.id', '=', 'tb_permohonan.id')
            ->where('tb_permohonan.id_permohonan', $request->id_permohonan)
            ->get('users.name', 'users.jabatan', 'users.divisi', 'users.no_hp', 'no_resi_ajuan', 'tanggal_permohonan', 'total_dana_ajuan', 'harga_satuan', 'jumlah_satuan', 'keterangan_permohonan')
            ->first();

        $kirim = $this->sendWhatsApp($request->id_permohonan); //pemohon


        if ($kirim) {
            return "success";
        } else {
            return "false";
        }
    }

    private function sendWhatsApp($id)
{
    $user = DB::table('users as u')
        ->join('tb_permohonan as p', 'u.id', '=', 'p.id')
        ->where('p.id_permohonan', '=', $id)
        ->select('u.*', 'p.*')
        ->get()
        ->first();

    $curl = curl_init();
    $token = "gvbDmLUMUkrsoRuWelzKZU9J88zhHbu0PJizx5QTlCRkda2s7Ne5BoGsApUZ4SI3";
    $phone = $user->no_hp;

    $totalDanaAjuan = number_format($user->total_dana_ajuan, 0, ',', '.');
    $hargaSatuan = number_format($user->harga_satuan, 0, ',', '.');

    $message = "*PERMOHONAN DANA E-VOUCHING*
==============================
Nama                    : " . $user->name . "
Jabatan                 : " . $user->jabatan . "
Divisi                  : " . $user->divisi . "
No Resi                 : " . $user->no_resi_ajuan . "
Tanggal Permohonan      : " . $user->tanggal_permohonan . "
Total Dana Yang Diajukan: Rp " . $totalDanaAjuan . "
Harga Satuan            : Rp " . $hargaSatuan . "
Jumlah Satuan           : " . $user->jumlah_satuan . "
Keterangan              : " . $user->keterangan_permohonan . "
Terimakasih
==============================";

    $encodedMessage = urlencode($message);
    $url = "https://solo.wablas.com/api/send-message?phone=$phone&message=$encodedMessage&token=$token";

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($curl);
    curl_close($curl);

    return true;
}

    public function menolak(Request $request)
    {
        $request->validate( //validasi
            [
                'komentar' => 'required'
            ]
        );
        $permohonan = Permohonan::findOrFail($request->id_permohonan);
        $permohonan->nominal_acc = '0';
        $permohonan->status_permohonan = '1';
        $permohonan->jenis_dana = '0';
        $permohonan->status_permohonan = '4';
        $permohonan->komentar = $request->komentar;
        $permohonan->ttd_bendahara = '1';
        $permohonan->update();

        $user = Permohonan::join('users', 'users.id', '=', 'tb_permohonan.id')
            ->where('tb_permohonan.id_permohonan', $request->id_permohonan)
            ->get('users.name', 'users.jabatan', 'users.divisi', 'users.no_hp', 'no_resi_ajuan', 'tanggal_permohonan', 'total_dana_ajuan', 'harga_satuan', 'jumlah_satuan', 'keterangan_permohonan', 'tb_permohonan.komentar')
            ->first();

        $kirim = $this->sendWhatsAppTolak($request->id_permohonan); //pemohon

        if ($kirim) {
            return "success";
        } else {
            return "false";
        }
    }

    private function sendWhatsAppTolak($id) {

        $user = DB::table('users as u')
        ->join('tb_permohonan as p', 'u.id', '=', 'p.id')
        ->where('p.id_permohonan', '=', $id)
        ->select('u.*', 'p.*')
        ->get()
        ->first();

    $curl = curl_init();
    $token = "gvbDmLUMUkrsoRuWelzKZU9J88zhHbu0PJizx5QTlCRkda2s7Ne5BoGsApUZ4SI3";
    $phone = $user->no_hp;

    $totalDanaAjuan = number_format($user->total_dana_ajuan, 0, ',', '.');
    $hargaSatuan = number_format($user->harga_satuan, 0, ',', '.');

    $message = "*PERMOHONAN DANA E-VOUCHING*
==============================
Nama                    : " . $user->name . "
Jabatan                 : " . $user->jabatan . "
Divisi                  : " . $user->divisi . "
No Resi                 : " . $user->no_resi_ajuan . "
Tanggal Permohonan      : " . $user->tanggal_permohonan . "
Total Dana Yang Diajukan: Rp " . $totalDanaAjuan . "
Harga Satuan            : Rp " . $hargaSatuan . "
Jumlah Satuan           : " . $user->jumlah_satuan . "
Keterangan              : " . $user->keterangan_permohonan . "
==============================
*PERMOHONAN SUDAH DI TOLAK BENDAHARA*
Komentar              : " . $user->komentar . "
Terimakasih
==============================";

    $encodedMessage = urlencode($message);
    $url = "https://solo.wablas.com/api/send-message?phone=$phone&message=$encodedMessage&token=$token";

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($curl);
    curl_close($curl);

    return true;
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
