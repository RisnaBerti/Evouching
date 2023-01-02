<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\PengajuanAdmin;

// use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\UserController;
// use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

//ROUTE FOR LOGIN
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');


// Route::controller(AuthController::class)->group(function () {
//     Route::get('/login', 'login');
//     Route::post('/ login', 'authenticating');
//     Route::get('/forgot_password', 'forgot_password', ["title" => "Forgot Password"]);
//     Route::get('/reset-password', 'reset_password', ["title" => "Reset Password"]);
//     Route::get('/change-password', 'change_password', ["title" => "Change Password"]);
//     Route::get('/profile', 'profile', ["title" => "Profile"]);
//     Route::get('/edit-profile', 'edit_profile', ["title" => "Edit Profile"]);
//     Route::get('/logout', 'logout');
// });

//ROUTE FOR ADMIN
Route::prefix('admin')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard-admin');
    // Route::get('/pengajuan', [PengajuanAdmin::class, 'pengajuan'])->name('admin.pengajuan-admin');
});



Route::get('/admin', function () {
    return view('admin/dashboard-admin', ["title" => "Dashboard"]);
});
Route::get('/pengajuan', function () {
    return view('admin/pengajuan-admin', ["title" => "Pengajuan Dana"]);
});
Route::get('/penerimaankas', function () {
    return view('admin/penerimaan-kas', ["title" => "Penerimaan Kas"]);
});
Route::get('/pembayarankas', function () {
    return view('admin/pembayaran-kas', ["title" => "Pembayaran Kas"]);
});
Route::get('/penerimaanbank', function () {
    return view('admin/penerimaan-bank', ["title" => "Penerimaan Bank"]);
});
Route::get('/pembayaranbank', function () {
    return view('admin/pembayaran-bank', ["title" => "Pembayaran Bank"]);
});
Route::get('/pengajuandanabank', function () {
    return view('admin/pengajuan-bank', ["title" => "Pengajuan Dana Bank"]);
});
Route::get('/datauser', function () {
    return view('admin/data-user', ["title" => "Data User"]);
});
Route::get('/laporanadmin', function () {
    return view('admin/laporan-admin', ["title" => "Laporan"]);
});
Route::get('/settingaccount', function () {
    return view('auth/edit-profile', ["title" => "Edit Profile"]);
});
Route::get('/settingchangepassword', function () {
    return view('auth/change-password', ["title" => "Change Password"]);
});




// Route::get('/admin', function () {
//     return view('admin/dashboard-admin', ["title" => "Dashboard"]);
// });

