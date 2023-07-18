<?php

namespace App\Http\Controllers\Manajer;

use App\Models\Permohonan;
use Twilio\Rest\Client;
use Illuminate\Http\Request;
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
        $return['data']  = Permohonan::join('users', 'users.id', '=', 'tb_permohonan.id')
            ->get(['users.*', 'tb_permohonan.*']);

        return response()->json($return);
    }

    //fungsi edit data
    public function edit(Request $request)
    {
        $permohonan = Permohonan::findOrFail($request->id_permohonan);
        $permohonan->status_permohonan = '3';
        $permohonan->ttd_manajer = '1';
        $permohonan->update();

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

    public function menolak(Request $request)
    {
        $permohonan = Permohonan::findOrFail($request->id_permohonan);
        $permohonan->status_permohonan = '4';
        $permohonan->ttd_manajer = '1';
        $permohonan->update();

        $sid    = "AC3b9deb3c57406702247d878eddb287da";
        $token  = "0b3bc836b58827ec36b6ce397249001c";
        $twilio = new Client($sid, $token);

        $message = $twilio->messages
        ->create(
            "whatsapp:+6285155456806", // to
            array(
                "from" => "whatsapp:+14155238886",
                "body" => "== PERMOHONAN DANA VOCHING == " .
                    // "\nNama       : " . $data->name .
                    // "\nJabatan    : " . $data->jabatan .
                    // "\Divisi      : " . $data->divisi .
                    // "\nNo Resi    : " . $data->no_resi_ajuan .
                    // "\nTotal Dana Yang Diajukan : " . $data->total_dana_ajuan .
                    // "\nKeterangan : " . $data->keterangan_permohonan .
                    "\nPERMOHONAN DI TOLAK OLEH PEMERIKSA" .
                    // "\Total Dana Di ACC : " . $request->nominal_acc .
                    "\nTerima Kasih" .
                    "\n================================"

            )
        );

        return "success";
    }
}

