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
        Route::prefix('user')->middleware(\App\Http\Middleware\PimpinanMiddleware::class)->group(
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

        Route::prefix('transaksi')->group(function (){
            Route::match(['POST', 'GET'], '', [TransaksiController::class, 'index']);
            Route::get('datatable', [TransaksiController::class, 'datatable']);
            Route::get('datatable/{id}', [TransaksiController::class, 'datatableDetail']);
            Route::post('keranjang/update-qty',[TransaksiController::class,'updateQty']);
            Route::post('keranjang/update-status',[TransaksiController::class,'updateStatus']);
            Route::post('keranjang/konfirmasi',[TransaksiController::class,'konfirmasi']);
        });
    }
);

Route::get('/admin/transaksi/cetak/{id}', [TransaksiController::class, 'cetakLaporan']);
Route::get('/admin/laporanpesanan', [LaporanPesananController::class, 'index']);
Route::get('/admin/masterbarang', [MasterBarangController::class, 'index']);
Route::get('/admin/masterpelanggan', [MasterPelangganController::class, 'index']);

Route::match(['POST','GET'],'/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/daftar', [DaftarController::class, 'store']);
