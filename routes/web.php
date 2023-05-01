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

// Route::group(['middleware' => ['auth']], function () {
    // admin
    // Route::group(['middleware' => ['UserCheckLogin:1']], function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('/profile-bendahara', 'index')->name('profile_bendahara');
            Route::get('/edit-profile-bendahara', 'profile')->name('edit_profile_bendahara');
            Route::post('/edit-profile-bendahara', 'update_profile')->name('update_profile_bendahara');
            Route::get('/change-password-bendahara', 'change_password')->name('change_password_bendahara');
            Route::post('/change-password-bendahara', 'update_password')->name('update_password_bendahara');
        });

        Route::controller(AdminController::class)->group(function () {
            Route::get('/bendahara', 'index')->name('bendahara');
        });

        Route::controller(PengajuanAdmin::class)->group(function () {
            Route::get('/permohonan-bendahara', 'index')->name('pemohon-admin');
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
            Route::get('/permohonan-manajer', 'permohonan')->name('permohonan-manajer');
            Route::get('/laporan-manajer', 'laporan')->name('laporan-manajer');
            Route::get('/profile-manajer', 'profile')->name('profile_manajer');
            Route::get('/edit-profile-manajer', 'edit_profile')->name('edit_profile_manajer');
            Route::post('/edit-profile-manajer', 'update_profile')->name('update_profile_manajer');
            Route::get('/change-password-manajer', 'change_password')->name('change_password_manajer');
            Route::post('/change-password-manajer', 'update_password')->name('update_password_manajer');
        });
    // });

    // pemohon
    // Route::group(['middleware' => ['userCheckLogin:3']], function () {
        Route::controller(PemohonController::class)->group(function () {
            Route::get('/dashboard-pemohon', 'index')->name('dashboard-pemohon');
            Route::get('/permohonan-pengurus', 'permohonan_pengurus')->name('permohonan-pengurus');
            Route::get('/profile-pemohon', 'profile')->name('profile_pemohon');
            Route::get('/edit-profile-pemohon', 'edit_profile')->name('edit_profile_pemohon');
            Route::post('/edit-profile-pemohon', 'update_profile')->name('update_profile_pemohon');
            Route::get('/change-password-pemohon', 'change_password')->name('change_password_pemohon');
            Route::post('/change-password-pemohon', 'update_password')->name('update_password_pemohon');
        });

        // Route::controller(UserController::class)->group(function () {
        //     Route::get('/profile-pemohon', 'index')->name('profile_pemohon');
        //     Route::get('/edit-profile-pemohon', 'profile')->name('edit_profile_pemohon');
        //     Route::post('/edit-profile-pemohon', 'update_profile')->name('update_profile_pemohon');
        //     Route::get('/change-password-pemohon', 'change_password')->name('change_password_pemohon');
        //     Route::post('/change-password-pemohon', 'update_password')->name('update_password_pemohon');
        // });
    // });
// });
