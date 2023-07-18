<?php

namespace App\Http\Controllers\Manajer;
use App\Models\ModelUmum;


use App\Models\Permohonan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ManajerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $danaAccCount = ModelUmum::countdanaacc();
        $data = ModelUmum::datapermohonandana();

        return view('manajer.dashboard-manajer',
        [
            'title' => 'Dashboard',
            'active' => 'dashboard-manajer',
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
