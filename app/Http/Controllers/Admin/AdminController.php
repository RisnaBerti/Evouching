<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        // $danaAccCount = Pengajuan::where(['status_pengajuan', 'ACC'], ['status_pengajuan', 'PENDING'])->sum('nominal_acc');
        // $danaAccCount = Pengajuan::where('status_pengajuan', 'ACC')->sum('nominal_acc');
        return view('admin.dashboard-admin',
            ["title" => "Dashboard"],
            ["userCount" => $userCount],
            ["active" => "Dashboard"]
        );
    }
}
  