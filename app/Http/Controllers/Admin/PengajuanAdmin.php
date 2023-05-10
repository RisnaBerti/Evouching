<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permohonan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

    public function get()
    {
        // $return['data'] = Permohonan::all();

        $return['data']  = Permohonan::join('users', 'users.id', '=', 'tb_permohonan.id')
        ->get(['users.name', 'tb_permohonan.*']);

        return response()->json($return);
    }
}
