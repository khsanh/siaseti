<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\MemoController;
use App\Http\Controllers\BeritaAcaraController;
use App\Http\Controllers\DetailAsetController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\MutasiController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\PenanggungJawabController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('/register', function () {
    return redirect('/login');
});

Route::post('/register', function () {
    return redirect('/login');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/profil', [ProfileController::class, 'view',])->name('User.viewprofil');
    Route::get('/profil/edit', [ProfileController::class, 'edit'])->name('User.editprofil');
    Route::put('/profil/update/{id}', [ProfileController::class, 'update'])->name('User.updateprofil');
});

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

// Route untuk tipe user 'user'

Route::resource('detailAset', DetailAsetController::class);
Route::group(
    [
        'prefix' => '/detailAset',
        'middleware' => 'auth'
    ],
    function () {
        Route::get('detailAset/{id}', [DetailAsetController::class, 'showLabel'])->name('detailAset.showLabel');
        Route::get('cetak/{idLokasi}', [DetailAsetController::class, 'showLabel2'])->name('detailAset.cetak');
    }
);
Route::resource('Memo', MemoController::class);
Route::resource('beritaAcara', BeritaAcaraController::class);
Route::group(
    [
        'prefix' => '/beritaAcara',
        'middleware' => 'auth'
    ],
    function () {
        Route::get('/create/{id}', [BeritaAcaraController::class, 'create2'])->name('beritaAcara.create2');
    }
);
Route::resource('Monitoring', MonitoringController::class);
Route::group(
    [
        'prefix' => '/monitoring',
        'middleware' => 'auth'
    ],
    function () {
        Route::get('/{iddetailaset}/list', [MonitoringController::class, 'listmonitoring'])->name('Monitoring.list');
        Route::DELETE('/{iddetailaset}/deleteall', [MonitoringController::class, 'destroyall'])->name('Monitoring.deleteall');
        Route::get('/scan', [MonitoringController::class, 'scan'])->name('Monitoring.scan');
        Route::post('/validasi', [MonitoringController::class, 'validasi'])->name('Monitoring.validasi');
        Route::get('/create/{id}', [MonitoringController::class, 'create2'])->name('Monitoring.create2');
    }
);
Route::group(
    [
        'prefix' => '/prosesMutasi',
        'middleware' => 'auth'
    ],
    function () {
        Route::get('/', [DetailAsetController::class, 'index2'])->name('prosesMutasi.index');
    }
);

Route::resource('Mutasi', MutasiController::class);
Route::group(
    [
        'prefix' => '/mutasi',
        'middleware' => 'auth'
    ],
    function () {
        Route::get('/{iddetailaset}/list', [MutasiController::class, 'listmutasi'])->name('Mutasi.list');
        Route::DELETE('/{iddetailaset}/deleteall', [MutasiController::class, 'destroyall'])->name('Mutasi.deleteall');
        Route::get('/create/{id}', [MutasiController::class, 'create3'])->name('Mutasi.create3');
        Route::post('/store2', [MutasiController::class, 'store2'])->name('Mutasi.store2');
        Route::get('/create2/{id}', [MutasiController::class, 'create2'])->name('Mutasi.create2');
    }
);

Route::group(['middleware' => 'role:admin'], function () {
    Route::resource('jenisBarang', JenisBarangController::class);
    Route::resource('penanggungJawab', PenanggungJawabController::class);
    Route::resource('lokasi', LokasiController::class);

});

Route::resource('admin', UsersController::class)->middleware(['auth', 'role:superadmin']);
