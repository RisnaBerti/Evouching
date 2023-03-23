<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\CaController;
use App\Http\Controllers\Admin\DataUserController;
use App\Http\Controllers\Admin\KasController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\PengajuanAdmin;
use App\Http\Controllers\Admin\ReimbuseController;




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
$controller_path = 'App\Http\Controllers';

//main route
Route::get('/', [AuthController::class, 'login'])->name('auth-login');

// authentification
Route::middleware('guest')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'login')->name('auth-login');
        Route::post('/login', 'authenticate')->name('auth-authenticate');
        Route::get('/forgot_password', 'forgot_password');
        Route::get('/reset-password', 'reset_password');
        Route::post('/reset-password', 'reset_password');
        Route::get('/profile', 'profile');
        Route::post('/profile', 'update_profile');
        Route::get('/changepassword', 'change_password');
        Route::post('/changepassword', 'change_password');
    });
});


// Route::middleware('auth')->group(function () {

    Route::get('/logout', [AuthController::class, 'logout']);

    //all user
    Route::controller(UserController::class)->group(function () {
        Route::get('/profile', 'profile')->name('profile');
        Route::post('/profile', 'update_profile');
        Route::get('/change_password', 'change_password');
        Route::post('/change_password', 'change_password');
    });

    //admin
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin', 'index')->name('admin');
    });
    Route::controller(PengajuanAdmin::class)->group(function () {
        Route::get('/pengajuan', 'index')->name('pengajuan');
    });
    Route::controller(DataUserController::class)->group(function () {
        Route::get('/datauser', 'index')->name('auth.user');
        Route::post('/datauser/add', 'add');
        Route::get('/datauser/active/{id_user}', 'active');
    });
    Route::controller(LaporanController::class)->group(function () {
        Route::get('/laporanadmin', 'index')->name('laporanadmin');
    });

    
// });





// ----------------------------------------------------------------------------------------
// Route::group(['middleware' => ['auth']], function () {

//     //Route for Admin
//     Route::group(['middleware' => ['role:bendahara']], function () {
//         // Route::resource('/admin', AdminController::class)->only(['index', 'show']);
//         // Route::resource('/pengajuan/admin', PengajuanAdmin::class)->only(['index', 'show']);
//     });

//     //route for admin
// });




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
