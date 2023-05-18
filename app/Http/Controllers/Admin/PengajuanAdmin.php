<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permohonan;


use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PembayaranKas;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use DB; //import fungsi query builder

class PengajuanAdmin extends Controller
{
    public function index()
    {
        $permohonan = Permohonan::all();
        return view(
            'admin/pengajuan-admin',
            ["permohonan" => $permohonan],
            ["title" => "Permohonan Dana"],
            ["active" => "Permohonan Dana"]
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
        $permohonan->status_permohonan = 1;
        $permohonan->jenis_dana = $request->jenis_dana;
        $permohonan->update();

        return "success";
    }
}
