<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AntarBankController extends Controller
{
    public function index()
    {
        return view('admin.penerimaan-antar-bank',
        [
            'title' => 'Penerimaan Antar Bank',
            'menu' => 'penerimaan-antar-bank'
        ]);
    }

    public function pembayaran_antar_bank()
    {
        return view('admin.pembayaran-antar-bank',
        [
            'title' => 'Pembayaran Antar Bank',
            'menu' => 'pembayaran-antar-bank'
        ]);
    }
}
