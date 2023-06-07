<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ModelUmum;
use App\Models\User;
use App\Models\Permohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $data = ModelUmum::datapermohonandana();
        $userCount = ModelUmum::countuser();
        $danaAccCount = ModelUmum::countdanaacc();
        $danakas = ModelUmum::countpermohonankas();
        $danabank = ModelUmum::countpermohonanbank();

        return view(
            'admin.dashboard-admin',
            [
                'title' => 'Dashboard',
                'active' => 'Dashboard',
                'data' => $data,
                'userCount' => $userCount,
                'danaAccCount' => $danaAccCount,
                'danakas' => $danakas,
                'danabank' => $danabank
            ]
        );
    }
}
