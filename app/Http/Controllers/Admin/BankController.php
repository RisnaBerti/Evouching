<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index()
    {
        return view('admin.penerimaan-bank', [
            'title' => 'Bank',
            'active' => 'Bank'
        ]);
    }

    public function pembayaran_bank()
    {
        return view('admin.pembayaran-bank', [
            'title' => 'Pembayaran Bank',
            'active' => 'Pembayaran Bank'
        ]);
    }
}
