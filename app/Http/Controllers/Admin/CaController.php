<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CaController extends Controller
{
    public function index()
    {
        return view('admin.penerimaan-ca', [
            'title' => 'PENERIMAAN CA',
            'active' => 'PENERIMAAN CA'
        ]);
    }

    public function pembayaran_ca()
    {
        return view('admin.pembayaran-ca', [
            'title' => 'PEMBAYARAN CA',
            'active' => 'PEMBAYARAN CA'
        ]);
    }
}
