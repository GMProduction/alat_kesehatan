<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    /**
     * @return mixed
     */
    public function index(){
        $transaksi = Transaksi::where('user_id','=',auth()->id())->get();
        return $transaksi;
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function detail($id){
        $transaksi = Transaksi::with('cart.barang')->find($id);
        return $transaksi;
    }

}
