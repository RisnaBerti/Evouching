<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class KasController extends Controller
{
    public function index()
    {
        return view('admin.penerimaan-kas', [
            'title' => 'Kas',
            'active' => 'Kas'
        ]);
    }

    public function pembayaran_kas()
    {
        return view('admin.pembayaran-kas', [
            'title' => 'Pembayaran Kas',
            'active' => 'Pembayaran Kas'
        ]);
    }
}
