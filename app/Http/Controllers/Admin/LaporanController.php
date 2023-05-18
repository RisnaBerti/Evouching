<?php

namespace App\Http\Controllers\Admin;
use PDF; 
use App\Models\Permohonan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function index()
    {    $data['data'] = User::join('users', 'users.id', '=', 'tb_permohonan.id')
                        ->join('tb_penerimaan_kas', 'tb_penerimaan_kas.id_permohonan', '=', 'tb_permohonan.id_permohonan')
                        ->get(['users.*', 'tb_permohonan.*', 'tb_penerimaan_kas.*']);

        return view('admin.laporan', [
            'title' => 'Laporan',
            'active' => 'Laporan',
            'data' => $data
        ]);
    }

    public function export_pdf(){
        
        	$data = [
        		'title' => 'Laporan Bendahara',
        		'active' => 'Laporan'
        	];
            $data['data'] = User::join('users', 'users.id', '=', 'tb_permohonan.id')
            ->join('tb_penerimaan_kas', 'tb_penerimaan_kas.id_permohonan', '=', 'tb_permohonan.id_permohonan')
            ->get(['users.*', 'tb_permohonan.*']);
            $laporan = PDF::loadview('laporan_pdf',['laporan'=>$data]);
            //mendownload laporan.pdf
            return $laporan->download('laporan-pdf');
    }
}
