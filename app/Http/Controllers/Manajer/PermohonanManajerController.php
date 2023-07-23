<?php

namespace App\Http\Controllers\Manajer;

use Twilio\Rest\Client;
use App\Models\Permohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PermohonanManajerController extends Controller
{
    public function index()
    {
        return view('manajer.permohonan-dana', [
            'title' => 'Permohonan',
            'active' => 'permohonan',
        ]);
    }

    //fungsi get data
    public function get()
    {
        $return['data'] = Permohonan::join('users', 'users.id', '=', 'tb_permohonan.id')
            ->whereIn('tb_permohonan.status_permohonan', [2, 3, 4])
            ->get(['users.*', 'tb_permohonan.*']);

        return response()->json($return);
    }

    //fungsi edit data
    public function edit(Request $request)
    {
        $request->validate( //validasi
            [
                'komentar' => 'required'
            ]
        );
        $permohonan = Permohonan::findOrFail($request->id_permohonan);
        $permohonan->status_permohonan = '3';
        $permohonan->ttd_manajer = '1';
        $permohonan->komentar = $request->komentar;
        $permohonan->update();

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
==============================
*PERMOHONAN SUDAH DI SETUJUI MANAJER*
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
        $request->validate([
            'komentar' => 'required'
        ]);

        $permohonan = Permohonan::findOrFail($request->id_permohonan);
        $permohonan->status_permohonan = '4';
        $permohonan->ttd_manajer = '1';
        $permohonan->komentar = $request->komentar;
        $permohonan->update();

        $user = Permohonan::join('users', 'users.id', '=', 'tb_permohonan.id')
            ->where('tb_permohonan.id_permohonan', $request->id_permohonan)
            ->get('users.name', 'users.jabatan', 'users.divisi', 'users.no_hp', 'tb_permohonan.no_resi_ajuan', 'tb_permohonan.tanggal_permohonan', 'tb_permohonan.total_dana_ajuan', 'tb_permohonan.harga_satuan', 'tb_permohonan.jumlah_satuan', 'tb_permohonan.keterangan_permohonan', 'tb_permohonan.komentar')
            ->first();

        $kirim = $this->sendWhatsAppTolak($request->id_permohonan); //pemohon

        if ($kirim) {
            return "success";
        } else {
            return "false";
        }
    }

    private function sendWhatsAppTolak($id)
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
==============================
*PERMOHONAN SUDAH DI TOLAK MANAJER*
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
}
