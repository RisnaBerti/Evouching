<?php

namespace App\Http\Controllers\Pemohon;

use App\Models\Permohonan;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PembayaranKas;
use App\Http\Controllers\Controller;
use App\Models\DetailPermohonan;
use App\Models\ModelUmum;
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
        //fungsi add permohonan

        // $request->validate([
        //     'no_resi_ajuan' => 'required',
        //     'tanggal_permohonan' => 'required',
        //     'terbilang' => 'required',
        // ]);

        $id_permohonan = str_replace('-', '', Str::uuid());
        Permohonan::create(
            [

                $id = Auth::user()->id,
                'id_permohonan' => $id_permohonan,
                'id' => ($id),
                'no_resi_ajuan' => $request->no_resi_ajuan,
                'tanggal_permohonan' => $request->tanggal_permohonan,
                'harga_satuan' => '0',
                'jumlah_satuan' => '0',
                'total_dana_ajuan' => $request->total_dana_ajuan,
                'nominal_acc' => '0',
                'keterangan_permohonan' => $request->keterangan_permohonan,
                'terbilang' => $request->terbilang,
                'jenis_dana' => '0',
                'status_permohonan' => '0',
                'ttd_pemohonan' => '0',
                'ttd_manajer' => '0',
                'ttd_pemeriksa' => '0',
                'ttd_bendahara' => '0'

            ]
        );



        return "success";
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
                'qty' => $request->qty,
                'harga_satuan' => $request->harga_satuan,
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

    public function getDetailPermohonan($id)
    {
        $detail_permohonan['data'] = ModelUmum::detailpermohonan($id);
        return $detail_permohonan;
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

    public function keterangan()
    {
        $permohonan = DetailPermohonan::all();
        return $permohonan;
    }
}
