<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengajuanAdmin extends Controller
{
    public function index()
    {
        return view('admin/pengajuan-admin', ["title" => "Pengajuan Dana"]);
    }
}
