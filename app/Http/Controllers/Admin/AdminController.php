<?php

namespace App\Http\Controllers;

use  App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin/dashboard-admin', 
        ["title" => "Dashboard"]
        );
    }


}
