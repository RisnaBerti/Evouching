<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CaController extends Controller
{
    public function index()
    {
        return view('admin.penerimaan-ca', [
            'title' => 'CA',
            'active' => 'CA'
        ]);
    }
}
