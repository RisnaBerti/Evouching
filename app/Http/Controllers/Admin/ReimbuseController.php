<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ReimbuseController extends Controller
{
    public function index()
    {
        return view('admin.pembayaran-reimbuse', [
            'title' => 'Reimbuse',
            'active' => 'Reimbuse'
        ]);
    }

    public function pegajuan_reimbuse()
    {
        return view('admin.pengajuan-reimbuse', [
            'title' => 'Pengajuan Reimbuse',
            'active' => 'Pengajuan Reimbuse'
        ]);
    }
}
