<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PengajuanAdmin extends Controller
{
    public function index()
    {
        return view('admin/pengajuan-admin', 
        ["title" => "Permohonan Dana"],
        ["active" => "Permohonan Dana"]
        );
    }
}
