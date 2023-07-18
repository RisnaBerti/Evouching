<?php

namespace App\Http\Controllers\Pemohon;

use App\Models\User;

use Twilio\Rest\Client;
use App\Models\ModelUmum;
use App\Models\Permohonan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PembayaranKas;
use App\Models\DetailPermohonan;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PermohonanPemohonController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $permohonan = ModelUmum::datapermohonandana()->where('id', Auth::user()->id);

        //fungsi index permohonan
        return view('pemohon.detail-permohonan', [
            'title' => 'Permohonan',
            'active' => 'permohonan',
            'permohonan' => $permohonan
        ]);
    }


    public function permohonan_pemohon($id)
    {
        $permohonan = ModelUmum::datapermohonandana()->where('id_permohonan', $id)->first();
        return view('pemohon.permohonan-dana', [
            'title' => 'Permohonan',
            'active' => 'permohonan',
            'permohonan' => $permohonan
        ]);
    }

    public function getmax()
    {
        $maxValue = Permohonan::max('no_resi_ajuan');

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
                'jenis_dana' => '0',
                'status_permohonan' => '0',
                'ttd_pemohon' => '1',
                'ttd_manajer' => '0',
                'ttd_pemeriksa' => '0',
                'ttd_bendahara' => '0',
                'komentar' => '0',
            ]
        );

        $this->sendWhatsApp('6285155456806',  Auth::user()->id); //bendahara
        $this->sendWhatsApp('6283863533646', Auth::user()->id); //manajer
        //$this->sendWhatsApp('6287889980443');//pemeriksa

        return "success";
    }

    private function sendWhatsApp($phone, $id)
    {
        $user = Permohonan::join('users', 'users.id', '=', 'tb_permohonan.id')
            ->where('tb_permohonan.id', $id)
            ->get('users.name', 'users.jabatan', 'users.divisi', 'no_resi_ajuan', 'tanggal_permohonan', 'total_dana_ajuan', 'harga_satuan', 'jumlah_satuan', 'keterangan_permohonan')
            ->first();

        $curl = curl_init();
        $token = "gvbDmLUMUkrsoRuWelzKZU9J88zhHbu0PJizx5QTlCRkda2s7Ne5BoGsApUZ4SI3";
        $message = "\n*PERMOHONAN DANA E-VOUCHING*" .
            "\n==============================" .
            "\nNama                    : " . $user->name .
            "\nJabatan                 : " . $user->jabatan .
            "\nDivisi                  : " . $user->divisi .
            "\nNo Resi                 : " . $user->no_resi_ajuan .
            "\nTanggal Permohonan      : " . $user->tanggal_permohonan .
            "\nTotal Dana Yang Diajukan: " . $user->total_dana_ajuan .
            "\nHarga Satuan            : " . $user->harga_satuan .
            "\nJumlah Satuan           : " . $user->jumlah_satuan .
            "\nKeterangan              : " . $user->keterangan_permohonan .
            "\nTerimakasih" .
            "\n==============================";
        $encodedMessage = urlencode($message);
        $url = "https://solo.wablas.com/api/send-message?phone=$phone&message=$encodedMessage&token=$token";

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($curl);
        curl_close($curl);

        echo "<pre>";
        print_r($result);
    }


    //fungsi edit user
    public function addDetailPermohonan(Request $request)
    {

        //simpan
        DetailPermohonan::create(
            [
                'id_detail_permohonan' => str_replace('-', '', Str::uuid()),
                'id_permohonan' => $request->id_permohonan,
                'nama_barang' => $request->nama_barang,
                'harga_satuan' => $request->harga_satuan,
                'qty' => $request->qty,
                'total_harga_barang' => $request->total_harga_barang
            ]
        );

        return "success";
    }

    //fungsi edit detail permohonan
    public function editDetailPermohonan(Request $request)
    {
        $detailPermohonan = DetailPermohonan::findOrFail($request->id_detail_permohonan);
        $detailPermohonan->nama_barang = $request->nama_barang;
        $detailPermohonan->qty = $request->qty;
        $detailPermohonan->harga_satuan = $request->harga_satuan;
        $detailPermohonan->total_harga_barang = $request->total_harga_barang;
        $detailPermohonan->update();

        return "success";
    }

    public function getDetailPermohonan(Request $request)
    {
        // $detail_permohonan = DetailPermohonan::join('tb_permohonan' , 'tb_permohonan.id_permohonan', '=', 'tb_detail_permohonan.id_permohonan')
        //                     ->where('tb_permohonan.id_permohonan', $request->id_permohonan);
        $detail_permohonan = DetailPermohonan::where('id_permohonan', $request->id_permohonan)->get();
        echo json_encode($detail_permohonan);
    }

    public function getNominalAjuan(Request $request)
    {
        $permohonan = Permohonan::where('id_permohonan', $request->id_permohonan)
            ->get('total_dana_ajuan')
            ->first();
        return response()->json($permohonan);
    }

    public function getSumHargaTotal(Request $request)
    {
        $permohonan = DetailPermohonan::select(DB::raw('SUM(harga_satuan) as harga_satuan'))
            ->where('id_permohonan', $request->id_permohonan)
            ->groupBy('id_permohonan')
            ->get()->first();
        // echo json_encode($permohonan);
        return response()->json($permohonan);
    }


    public function deleteDetailPermohonan(Request $request)
    {
        $detailPermohonan = DetailPermohonan::findOrFail($request->id_detail_permohonan);
        $detailPermohonan->delete();

        return "success";
    }

    function simpanPembayaranKas(Request $request)
    {
        PembayaranKas::create(
            [
                'id_pembayaran_kas' => str_replace('-', '', Str::uuid()),
                'id_permohonan' => $request->id_permohonan,
                'id' =>  Auth::user()->id,
                'no_resi_bayar_kas' => '0',
                'tanggal_pembayaran_kas' => '0',
                'bukti_transaksi' => '.png',
                'status' => '0'
            ]
        );
    }


    public function getPermohonan()
    {
        $permohonan = ModelUmum::datapermohonandana();
        return $permohonan;
    }

    public function keterangan(Request $request)
    {
        $permohonan = DetailPermohonan::where('id_permohonan',  $request->id_permohonan)->get();
        return response()->json($permohonan);
    }

    public function notif()
    {
        $sid    = "AC3b9deb3c57406702247d878eddb287da";
        $token  = "0b3bc836b58827ec36b6ce397249001c";
        $twilio = new Client($sid, $token);

        $message = $twilio->messages
            ->create(
                "whatsapp:+6285155456806", // to
                array(
                    "from" => "whatsapp:+14155238886",
                    "body" => "Cek Risna"
                )
            );
    }
}
