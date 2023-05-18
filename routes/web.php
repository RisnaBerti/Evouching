<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AntarBankController;
use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\CaController;
use App\Http\Controllers\Admin\DataUserController;
use App\Http\Controllers\Admin\KasController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\PengajuanAdmin;
use App\Http\Controllers\Admin\ReimbuseController;
use App\Http\Controllers\Manajer\ManajerController;
use App\Http\Controllers\Pemohon\AkunControllerPemohon;
use App\Http\Controllers\Pemohon\PemohonController;
use App\Http\Controllers\Pemohon\PermohonanPemohonController;

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
Route::get('/cek', [DataUserController::class, 'cek']);

Route::get('/cek2', [PermohonanPemohonController::class, 'getmax']);

//main route
Route::get('/', [AuthController::class, 'login'])->name('auth-login');

// authentification
Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware('guest')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'login')->name('auth-login');
        Route::post('/login', 'authenticate')->name('auth-authenticate');
        Route::get('/forgot-password', 'forgot_password');
        Route::get('/reset-password', 'reset_password');
        Route::post('/reset-password', 'reset_password');
    });
});

// Route::group(['middleware' => ['auth']], function () {
// all user
Route::controller(UserController::class)->group(function () {
    Route::get('/profile', 'index')->name('profile');
    Route::get('/profile-bendahara', 'index')->name('profile_bendahara');
    Route::get('/edit-profile-bendahara', 'profile');
    Route::post('/edit-profile-bendahara', 'update_profile');
    Route::get('/change-password-bendahara', 'change_password')->name('change_password_bendahara');
    Route::post('/change-password-bendahara', 'update_password')->name('change_password_bendahara');
});

// admin
// Route::group(['middleware' => ['UserCheckLogin:1']], function() {
// Route::middleware('UserCheckLogin:1')->group(function () {
Route::controller(AdminController::class)->group(function () {
    Route::get('/bendahara', 'index')->name('bendahara');
});

Route::controller(DataUserController::class)->group(function () {
    Route::get('/datauser', 'index')->name('datauser');
    Route::post('/datauser/add', 'add');
    Route::post('/datauser/edit', 'edit');
    Route::post('/datauser/delete', 'destroy');
    Route::get('/datauser/active/{id}', 'active');
    Route::get('/datauser/nonactive/{id}', 'nonactive');
});

Route::controller(PengajuanAdmin::class)->group(function () {
    Route::get('/permohonan-bendahara', 'index')->name('permohonan_bendahara');
    Route::post('/permohonan-bendahara/get', 'get');
    Route::post('/permohonan-bendahara/edit', 'edit');
});

Route::controller(KasController::class)->group(function () {
    Route::get('/penerimaankas', 'index')->name('kas');
    Route::post('/penerimaan-kas/get', 'get_penerimaan_kas');
    Route::post('/penerimaan-kas/edit', 'edit_penerimaan_kas');
    Route::get('/pembayarankas', 'pembayaran_kas')->name('pembayaran-kas');
    Route::post('/pembayaran-kas/get', 'get_pembayaran_kas')->name('pembayaran-kas');
    Route::post('/pembayaran-kas/edit', 'edit_pembayaran_kas')->name('pembayaran-kas');
});

Route::controller(BankController::class)->group(function () {
    Route::get('/penerimaanbank', 'index')->name('bank');
    Route::post('/penerimaan-bank/get', 'get_penerimaan_bank');
    Route::post('/penerimaan-bank/edit', 'edit_penerimaan_bank');
    Route::get('/pembayaranbank', 'pembayaran_bank')->name('pembayaran-bank');
    Route::post('/pembayaran-bank/get', 'get_pembayaran_bank')->name('pembayaran-bank');
    Route::post('/pembayaran-bank/edit', 'edit_pembayaran_bank')->name('pembayaran-bank');
});

Route::controller(CaController::class)->group(function () {
    Route::get('/penerimaanca', 'index')->name('ca');
    Route::get('/pembayaranca', 'pembayaran_ca')->name('pembayaran-ca');
});

Route::controller(ReimbuseController::class)->group(function () {
    Route::get('/reimbuse', 'index')->name('reimbuse');
    Route::get('/pegajuan_reimbuse', 'pegajuan_reimbuse');
});

Route::controller(AntarBankController::class)->group(function () {
    Route::get('/penerimaan-antarbank', 'index')->name('antarbank');
    Route::post('/penerimaan-antarbank/add', 'add_penerimaan_antarbank');
    Route::get('/pembayaran-antarbank', 'pembayaran_antar_bank')->name('pembayaran-antarbank');
    Route::post('/pembayaran-antarbank/add', 'add_pembayaran_antarbank')->name('pembayaran-antarbank');
});

Route::controller(LaporanController::class)->group(function () {
    Route::get('/laporan-bendahara', 'index')->name('laporan');
    Route::post('/laporan-bendahara/pdf', 'export_pdf');
});
// });

// manajer
// Route::middleware('UserCheckLogin:2')->group(function () {
Route::controller(ManajerController::class)->group(function () {
    Route::get('/dashboard-manajer', 'index')->name('dashboard-manajer');
});
Route::controller((AkunControllerPemohon::class))->group(function () {
    Route::get('/profile-manajer', 'index')->name('profile_manajer');
    Route::get('/edit-profile-manajer', 'profile');
    Route::post('/edit-profile-manajer', 'update_profile');
    Route::get('/change-password-manajer', 'change_password');
    Route::post('/change-password-manajer', 'update_password')->name('change_password_manajer');
});
// });

// pemohon
// Route::group(['middleware' => ['userCheckLogin:3']], function() {
// Route::middleware('UserCheckLogin:4')->group(function () {
Route::controller(PemohonController::class)->group(function () {
    Route::get('/dashboard-pemohon', 'index')->name('dashboard-pemohon');
});
Route::controller(PermohonanPemohonController::class)->group(function () {
    Route::get('/permohonan-pemohon', 'permohonan_pemohon')->name('permohonan_pemohon');
    Route::post('/permohonan/add', 'add');
    Route::post('/permohonan/add/kas', 'simpanPembayaranKas');
    Route::get('/permohonan/getmax', 'getmax');
});
Route::controller((AkunControllerPemohon::class))->group(function () {
    Route::get('/profile-pemohon', 'index')->name('profile_pemohon');
    Route::get('/edit-profile-pemohon', 'profile');
    Route::post('/edit-profile-pemohon', 'update_profile');
    Route::get('/change-password-pemohon', 'change_password');
    Route::post('/change-password-pemohon', 'update_password')->name('change_password_pemohon');
});
    // });

// });
