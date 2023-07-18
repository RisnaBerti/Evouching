<?php

namespace App\Http\Controllers\Pemeriksa;

use App\Models\ModelUmum;
use App\Models\Permohonan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PemeriksaController extends Controller
{ 
    public function index()
    {
        $danaAccCount = ModelUmum::countdanaacc();
        $data = ModelUmum::datapermohonandana();

        return view('pemeriksa.dashboard-pemeriksa',
        [
            'title' => 'Dashboard',
            'active' => 'dashboard-pemeriksa',
            'danaAccCount' => $danaAccCount,
            'data' => $data
        ]);
    }
    
    public function getDataActivity()
    {
        $data = Permohonan::all();
        echo json_encode($data);
    }
}
