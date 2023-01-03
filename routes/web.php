<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
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

//Main Route
Route::get('/', function () {
    return redirect()->route('auth-login');
});

// authentification
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('auth-login');
    Route::post('/login', 'authenticate')->name('auth-authenticate');
    Route::get('/logout', 'logout')->name('auth-logout');
    Route::get('/forgot_password', 'forgot_password', ["title" => "Forgot Password"]);
    Route::get('/reset-password', 'reset_password', ["title" => "Reset Password"]);
});

//Route for User
Route::controller(UserController::class)->group(function () {
    Route::get('/profile', 'profile');
    Route::post('/profile', 'update_profile');
    Route::get('/change_password', 'change_password');
    Route::post('/change_password', 'change_password');
});

Route::group(['middleware' => ['auth']], function () {

    //Route for Admin
    Route::group(['middleware' => ['role:bendahara']], function () {
        // Route::resource('/admin', AdminController::class)->only(['index', 'show']);
        // Route::resource('/pengajuan/admin', PengajuanAdmin::class)->only(['index', 'show']);
    });

});




// //ROUTE FOR ADMIN
// Route::get('/admin', function () {
//     return view('admin/dashboard-admin', ["title" => "Dashboard"]);
// })->middleware('auth');

// Route::get('/pengajuan', function () {
//     return view('admin/pengajuan-admin', ["title" => "Pengajuan Dana"]);
// });
// Route::get('/penerimaankas', function () {
//     return view('admin/penerimaan-kas', ["title" => "Penerimaan Kas"]);
// });
// Route::get('/pembayarankas', function () {
//     return view('admin/pembayaran-kas', ["title" => "Pembayaran Kas"]);
// });
// Route::get('/penerimaanbank', function () {
//     return view('admin/penerimaan-bank', ["title" => "Penerimaan Bank"]);
// });
// Route::get('/pembayaranbank', function () {
//     return view('admin/pembayaran-bank', ["title" => "Pembayaran Bank"]);
// });
// Route::get('/pengajuandanabank', function () {
//     return view('admin/pengajuan-bank', ["title" => "Pengajuan Dana Bank"]);
// });
// Route::get('/datauser', function () {
//     return view('admin/data-user', ["title" => "Data User"]);
// });
// Route::get('/laporanadmin', function () {
//     return view('admin/laporan-admin', ["title" => "Laporan"]);
// });
// Route::get('/settingaccount', function () {
//     return view('auth/edit-profile', ["title" => "Edit Profile"]);
// });
// Route::get('/settingchangepassword', function () {
//     return view('auth/change-password', ["title" => "Change Password"]);
// });

//ROUTE FOR MANAJER
// Route::get('/manajer', function () {
//     return view('manajer/dashboard-manajer', ["title" => "Dashboard"]);
// });
