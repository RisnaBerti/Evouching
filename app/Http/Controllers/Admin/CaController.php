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

        // $sid    = "AC3b9deb3c57406702247d878eddb287da";
        // $token  = "0b3bc836b58827ec36b6ce397249001c";
        // $twilio = new Client($sid, $token);

        // $message = $twilio->messages
        //     ->create(
        //         "whatsapp:+6285155456806", // to
        //         array(
        //             "from" => "whatsapp:+14155238886",
        //             "body" => "==============================" .
        //                 "\n*PERMOHONAN DANA E-VOUCHING*" .
        //                 "\n==============================".
        //                 "\nNama                    : " . $user->name .
        //                 "\nJabatan                 : " . $user->jabatan .
        //                 "\nDivisi                  : " . $user->divisi .
        //                 "\nNo Resi                 : " . $request->no_resi_ajuan .
        //                 "\nTanggal Permohonan      : " . $request->tanggal_permohonan .
        //                 "\nTotal Dana Yang Diajukan: " . $request->total_dana_ajuan .
        //                 "\nHarga Satuan            : " . $request->harga_satuan .
        //                 "\nJumlah Satuan           : " . $request->jumlah_satuan .
        //                 "\nKeterangan              : " . $request->keterangan_permohonan .
        //                 "\nTerimakasih" .
        //                 "\n=============================="
        //         )
        //     );

        return "success";
    }

    public function get()
    {
        // $data['data'] = Permohonan::join('users', 'users.id', '=', 'tb_permohonan.id')
        //     ->join('tb_ca', 'tb_ca.id_permohonan', '=', 'tb_permohonan.id_permohonan')
        //     ->where('tb_permohonan.jenis_dana', '=', 'Chartered Accountant')
        //     ->get(['users.id', 'users.name', 'users.jabatan', 'users.divisi', 'tb_permohonan.id_permohonan', 'tb_ca.id_ca', 'tb_permohonan.nominal_acc','tb_permohonan.total_dana_ajuan', 'tb_permohonan.keterangan_permohonan', 'tb_permohonan.terbilang', 'tb_permohonan.tanggal_permohonan', 'tb_ca.bukti_transaksi', 'tb_ca.tanggal_penerimaan_ca', 'tb_ca.nominal_terpakai']);

        $data = DB::select(DB::raw('SELECT
        users.name,
        tb_permohonan.tanggal_permohonan,
        tb_permohonan.jenis_dana,
        tb_permohonan.keterangan_permohonan,
        tb_permohonan.total_dana_ajuan,
        tb_permohonan.status_permohonan,
        tb_ca.id_ca,
        FROM
        tb_permohonan
        LEFT JOIN users USING(id)
        LEFT JOIN tb_ca USING(id_permohonan)
        WHERE tb_permohonan.jenis_dana="Chartered Accountant"
        
        '));

        return $data;
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
            'file_edit' => 'required|mimes:.pdf,jpg,jpeg,png|max:8048',
        ]);

        $ip = $request->id_permohonan_edit;

        $fileName = $ip . '.' . $request->file_edit->extension();
        $request->file_edit->move(public_path('bukti/ca'), $fileName);

        return response()->json(['message' => 'Operation Successful !', 
        'filename' => $fileName, 
        'id_ca' => $request->id_ca_edit, 
        'no_resi_ca' => $request->no_resi_ca_edit,  
        'id_permohonan' => $request->id_permohonan_edit, 
        'tanggal_penerimaan_ca' => $request->tanggal_penerimaan_ca_edit, 
        'nominal_terpakai' => $request->nominal_terpakai_edit]);
    }
}
