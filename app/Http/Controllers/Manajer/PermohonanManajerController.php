<?php

namespace App\Http\Controllers\Manajer;

use App\Models\Permohonan;
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
        $permohonan->status_permohonan = '2';
        $permohonan->ttd_manajer = '1';
        $permohonan->update();

        return "success";
    }
}
