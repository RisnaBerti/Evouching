<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Permohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        // $userCount = DB::table('users')->where('role_id', '4')->count();
        // $danaAccCount = DB::table('tb_permohonan')->where('status_permohonan', '1')->sum('nominal_acc');
        $userCount = User::all()->count();
        //$danaAccCount = Permohonan::where('status_permohonan', '1')->sum('nominal_acc');
        return view(
            'admin.dashboard-admin',
            ["title" => "Dashboard"],
            ["active" => "Dashboard"],
            ["userCount" => $userCount],
            // ["danaAccCount" => $danaAccCount],
        );
    }
}
