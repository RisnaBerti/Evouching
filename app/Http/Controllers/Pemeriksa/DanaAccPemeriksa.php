<?php

namespace App\Http\Controllers\Pemeriksa;

use App\Models\Permohonan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DanaAccPemeriksa extends Controller
{
    public function index()
    {
        return view('pemeriksa.permohonan-acc', [
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
        $permohonan->ttd_pemeriksa = '1';
        $permohonan->update();

        return "success";
    }
}
