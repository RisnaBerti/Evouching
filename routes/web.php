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
use App\Http\Controllers\Manajer\ManajerController;
use App\Http\Controllers\Pemohon\PemohonController;



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
Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware('guest')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'login')->name('auth-login');
        Route::post('/login', 'authenticate')->name('auth-authenticate');
        Route::get('/forgot_password', 'forgot_password');
        Route::get('/reset-password', 'reset_password');
        Route::post('/reset-password', 'reset_password');
    });
});

Route::group(['middleware' => ['auth']], function () {
    // all user
    Route::controller(UserController::class)->group(function () {
        Route::get('/profile', 'index')->name('profile');
        Route::get('/edit-profile', 'profile');
        Route::post('/edit-profile', 'update_profile');
        Route::get('/change-password', 'change_password');
        Route::post('/change-password', 'update_password')->name('change-password');
    });

    // admin
    // Route::group(['middleware' => ['UserCheckLogin:1']], function() {
    // Route::middleware('UserCheckLogin:1')->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('/bendahara', 'index')->name('bendahara');
        });

        Route::controller(PengajuanAdmin::class)->group(function () {
            Route::get('/permohonan', 'index')->name('pemohon-admin');
        });

        Route::controller(DataUserController::class)->group(function () {
            Route::get('/datauser', 'index')->name('auth.user');
            Route::post('/datauser/add', 'add');
            Route::get('/is_active/{id}', 'is_active');
        });

        Route::controller(LaporanController::class)->group(function () {
            Route::get('/laporan-bendahara', 'index')->name('laporan');
        });

        Route::controller(BankController::class)->group(function () {
            Route::get('/penerimaanbank', 'index')->name('bank');
            Route::get('/pembayaranbank', 'pembayaran_bank')->name('pembayaran-bank');
        });

        Route::controller(CaController::class)->group(function () {
            Route::get('/penerimaanca', 'index')->name('ca');
            Route::get('/pembayaranca', 'pembayaran_ca')->name('pembayaran-ca');
        });

        Route::controller(KasController::class)->group(function () {
            Route::get('/penerimaankas', 'index')->name('kas');
            Route::get('/pembayarankas', 'pembayaran_kas')->name('pembayaran-kas');
        });

        Route::controller(ReimbuseController::class)->group(function () {
            Route::get('/reimbuse', 'index')->name('reimbuse');
            Route::get('/pegajuan_reimbuse', 'pegajuan_reimbuse');
        });
    // });

    // manajer
    // Route::middleware('UserCheckLogin:2')->group(function () {
        Route::controller(ManajerController::class)->group(function () {
            Route::get('/dashboard-manajer', 'index')->name('dashboard-manajer');
        });
    // });

    // pemohon
    // Route::group(['middleware' => ['userCheckLogin:3']], function() {
    // Route::middleware('UserCheckLogin:4')->group(function () {
        Route::controller(PemohonController::class)->group(function () {
            Route::get('/dashboard-pemohon', 'index')->name('dashboard-pemohon');
            Route::get('/permohonan-pengurus', 'permohonan_pengurus')->name('permohonan-pengurus');
        });
    // });

});


