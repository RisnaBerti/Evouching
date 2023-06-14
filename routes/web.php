<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\CaController;
use App\Http\Controllers\Admin\KasController;
use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\PengajuanAdmin;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\DataUserController;
use App\Http\Controllers\Admin\ReimbuseController;
use App\Http\Controllers\Admin\AntarBankController;
use App\Http\Controllers\Manajer\ManajerController;
use App\Http\Controllers\Manajer\PermohonanManajerController;
use App\Http\Controllers\Pemeriksa\AkunPemeriksaController;
use App\Http\Controllers\Pemohon\PemohonController;
use App\Http\Controllers\Pemohon\AkunControllerPemohon;
use App\Http\Controllers\Pemohon\PermohonanPemohonController;
use App\Http\Controllers\Pemeriksa\PemeriksaController;
use App\Http\Controllers\Pemohon\PengajuanCaController;

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

Route::get('/la', [KasController::class, 'laporan']);

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
    Route::post('/penerimaan-kas/edit', 'edit_penerimaan_kas')->name('penerimaankas.upload');
    Route::post('/penerimaan-kas/ubah', 'ubah_penerimaan_kas')->name('penerimaankas.ubah');
    Route::post('/penerimaan-kas/editid', 'edit_penerimaan_kas_id')->name('penerimaankas.uploadid');
    Route::post('/penerimaan-kas/ubahid', 'ubah_penerimaan_kas_id')->name('penerimaankas.ubahid');
    Route::post('/penerimaan-kas/getid', 'get_penerimaan_kas_id')->name('penerimaankas.getid');
    Route::get('/penerimaan-kas/getmax', 'getmax');

    Route::get('/pembayarankas', 'pembayaran_kas');
    Route::post('/pembayaran-kas/get', 'get_pembayaran_kas');
    Route::post('/pembayaran-kas/edit', 'edit_pembayaran_kas')->name('pembayarankas.upload');
    Route::post('/pembayaran-kas/ubah', 'ubah_pembayaran_kas')->name('pembayarankas.ubah');
    Route::post('/pembayaran-kas/editid', 'edit_pembayaran_kas_id')->name('pembayarankas.uploadid');
    Route::post('/pembayaran-kas/ubahid', 'ubah_pembayaran_kas_id')->name('pembayarankas.ubahid');
    Route::post('/pembayaran-kas/getid', 'get_pembayaran_kas_id')->name('pembayarankas.getid');
    Route::get('/pembayaran-kas/getmax2', 'getmax2');
});

Route::controller(BankController::class)->group(function () {
    Route::get('/penerimaanbank', 'index')->name('bank');
    Route::post('/penerimaan-bank/get', 'get_penerimaan_bank');
    Route::post('/penerimaan-bank/edit', 'edit_penerimaan_bank')->name('penerimaanbank.upload');
    Route::post('/penerimaan-bank/ubah', 'ubah_penerimaan_bank')->name('penerimaanbank.ubah');
    Route::post('/penerimaan-bank/editid', 'edit_penerimaan_bank_id')->name('penerimaanbank.uploadid');
    Route::post('/penerimaan-bank/ubahid', 'ubah_penerimaan_bank_id')->name('penerimaanbank.ubahid');
    Route::post('/penerimaan-bank/getid', 'get_penerimaan_bank_id')->name('penerimaanbank.getid');
    Route::get('/penerimaan-bank/getmax', 'getmax');

    Route::get('/pembayaranbank', 'pembayaran_bank');
    Route::post('/pembayaran-bank/get', 'get_pembayaran_bank');
    Route::post('/pembayaran-bank/edit', 'edit_pembayaran_bank')->name('pembayaranbank.upload');
    Route::post('/pembayaran-bank/ubah', 'ubah_pembayaran_bank')->name('pembayaranbank.ubah');
    Route::post('/pembayaran-bank/editid', 'edit_pembayaran_bank_id')->name('pembayaranbank.uploadid');
    Route::post('/pembayaran-bank/ubahid', 'ubah_pembayaran_bank_id')->name('pembayaranbank.ubahid');
    Route::post('/pembayaran-bank/getid', 'get_pembayaran_bank_id')->name('pembayaranbank.getid');
    Route::get('/pembayaran-bank/getmax', 'getmax2');
});

Route::controller(CaController::class)->group(function () {
    Route::get('/penerimaanca', 'index')->name('ca');
    Route::get('/pembayaranca', 'pembayaran_ca')->name('pembayaran-ca');
    Route::get('/pembayaran-ca/getmax_ca', 'getmax_ca');
    Route::post('/pembayaran-ca/get', 'get');

});

Route::controller(ReimbuseController::class)->group(function () {
    Route::get('/reimbuse', 'index')->name('reimbuse');
    Route::get('/pegajuan_reimbuse', 'pegajuan_reimbuse');
});

Route::controller(AntarBankController::class)->group(function () {
    Route::get('/penerimaan-antarbank', 'index')->name('penerimaan-antarbank');
    Route::get('/penerimaan-antarbank/getmax', 'getmax');
    Route::post('/penerimaan-antarbank/get', 'get_penerimaan_antar_bank');
    Route::post('/penerimaan-antarbank/add', 'penerimaan_antar_bank_add');
    Route::post('/penerimaan-antarbank/edit', 'penerimaan_antar_bank_edit');

    Route::get('/pembayaran-antarbank', 'pembayaran_antar_bank')->name('pembayaran-antarbank');
    Route::get('/pembayaran-antarbank/getmax', 'getmax2');
    Route::post('/pembayaran-antarbank/get', 'get_pembayaran_antar_bank');
    Route::post('/pembayaran-antarbank/add', 'pembayaran_antar_bank_add');
    Route::post('/pembayaran-antarbank/edit', 'pembayaran_antar_bank_edit');
    Route::post('/pembayaran-antarbank/delete', 'pembayaran_antar_bank_delete');
});

Route::controller(LaporanController::class)->group(function () {
    Route::get('/laporan-bendahara', 'index');
    Route::get('/laporan-bendahara/pdf', 'export_pdf');
});
// });

// manajer
// Route::middleware('UserCheckLogin:2')->group(function () {
Route::controller(ManajerController::class)->group(function () {
    Route::get('/dashboard-manajer', 'index')->name('dashboard-manajer');
});
Route::controller(PermohonanManajerController::class)->group(function () {
    Route::get('/permohonan-manajer', 'index')->name('permohonan-manajer');
    Route::post('/permohonan-manajer/get', 'get');
    Route::post('/permohonan-manajer/edit', 'edit');
});
Route::controller((AkunControllerManajer::class))->group(function () {
    Route::get('/profile-manajer', 'index')->name('profile_manajer');
    Route::get('/edit-profile-manajer', 'profile');
    Route::post('/edit-profile-manajer', 'update_profile');
    Route::get('/change-password-manajer', 'change_password');
    Route::post('/change-password-manajer', 'update_password')->name('change_password_manajer');
});
// });

//pemeriksa
// Route::group(['middleware' => ['UserCheckLogin:3']], function() {
// Route::middleware('UserCheckLogin:3')->group(function () {
Route::controller(PemeriksaController::class)->group(function () {
    Route::get('/dashboard-pemeriksa', 'index')->name('dashboard-pemeriksa');
});
Route::controller((AkunPemeriksaController::class))->group(function () {
    Route::get('/profile-pemeriksa', 'index')->name('profile_pemeriksa');
    Route::get('/edit-profile-pemeriksa', 'profile');
    Route::post('/edit-profile-pemeriksa', 'update_profile');
    Route::get('/change-password-pemeriksa', 'change_password');
    Route::post('/change-password-pemeriksa', 'update_password')->name('change_password_pemeriksa');
});


// pemohon
// Route::group(['middleware' => ['userCheckLogin:3']], function() {
// Route::middleware('UserCheckLogin:4')->group(function () {
Route::controller(PemohonController::class)->group(function () {
    Route::get('/dashboard-pemohon', 'index')->name('dashboard-pemohon');
    Route::get('/dashboard-pemohon/get', 'permohonan_dana');
});
Route::controller(PermohonanPemohonController::class)->group(function () {
    Route::get('/detail-permohonan', 'index');
    Route::post('/detail-permohonan/add', 'addDetailPermohonan');
    Route::post('/detail-permohonan/getdata/{id}', 'getDetailPermohonan');
    Route::post('/detail-permohonan/edit', 'editDetailPermohonan');

    Route::post('/keterangan/all', 'keterangan')->name('keterangan.all');


    Route::get('/permohonan-dana', 'getPermohonan');
    Route::get('/permohonan-pemohon/{id}', 'permohonan_pemohon');
    Route::post('/permohonan/add', 'add');
    // Route::post('/permohonan/add/kas', 'simpanPembayaranKas');
    Route::get('/permohonan/getmax', 'getmax');
});
Route::controller((AkunControllerPemohon::class))->group(function () {
    Route::get('/profile-pemohon', 'index')->name('profile_pemohon');
    Route::get('/edit-profile-pemohon', 'profile');
    Route::post('/edit-profile-pemohon', 'update_profile');
    Route::get('/change-password-pemohon', 'change_password');
    Route::post('/change-password-pemohon', 'update_password')->name('change_password_pemohon');
});

Route::controller((PengajuanCaController::class))->group(function () {
    Route::get('/pengajuan-ca/getmax3', 'getmax3');
    Route::get('/pengajuan-ca', 'index');
    Route::post('/pengajuan-ca/get', 'get');
    Route::post('/pengajuan-ca/add', 'add');

});
    // });

// });
