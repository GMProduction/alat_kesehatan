<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('barangs',[\App\Http\Controllers\API\BarangController::class,'index']);
    Route::get('profile',[\App\Http\Controllers\API\UserController::class,'index']);
    Route::prefix('cart')->group(function (){
        Route::match(['POST','GET'],'', [\App\Http\Controllers\API\CartController::class,'cart']);
        Route::post('/checkout', [\App\Http\Controllers\API\CartController::class,'checkout']);
    });
    Route::prefix('transaction')->group(function (){
        Route::get('',[\App\Http\Controllers\API\TransaksiController::class,'index']);
        Route::get('{id}',[\App\Http\Controllers\API\TransaksiController::class,'detail']);
        Route::post('{id}/terima',[\App\Http\Controllers\API\TransaksiController::class,'terima']);
    });

});

Route::post('login',[\App\Http\Controllers\API\LoginController::class,'login']);
