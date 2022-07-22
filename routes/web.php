<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\KlinikController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanPesananController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\MasterBarangController;
use App\Http\Controllers\MasterPelangganController;
use App\Http\Controllers\UserController;
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


Route::prefix('admin')->middleware('auth')->group(
    function () {
        Route::get(
            '',[BerandaController::class,'index']
        );
        Route::prefix('user')->group(
            function () {
                Route::match(['POST', 'GET'], '', [UserController::class, 'index']);
                Route::get('datatable', [UserController::class, 'datatable']);
            }
        );
        Route::prefix('klinik')->group(
            function () {
                Route::match(['POST', 'GET'], '', [KlinikController::class, 'index']);
                Route::get('datatable', [KlinikController::class, 'datatable']);
            }
        );
        Route::prefix('barang')->group(
            function () {
                Route::match(['POST', 'GET'], '', [BarangController::class, 'index']);
                Route::get('datatable', [BarangController::class, 'datatable']);
                Route::get('datatable/{id}', [BarangController::class, 'datatableDetail']);
            }
        );
    }
);

Route::get('/admin/transaksi', [TransaksiController::class, 'index']);
Route::get('/admin/transaksi/cetak/{id}', [TransaksiController::class, 'cetakLaporan']);
Route::get('/admin/laporanpesanan', [LaporanPesananController::class, 'index']);
Route::get('/admin/masterbarang', [MasterBarangController::class, 'index']);
Route::get('/admin/masterpelanggan', [MasterPelangganController::class, 'index']);

Route::match(['POST','GET'],'/', [LoginController::class, 'index'])->name('login');
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/daftar', [DaftarController::class, 'store']);
