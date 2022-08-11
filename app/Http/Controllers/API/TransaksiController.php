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
        $transaksi = Transaksi::with('cart')->find($id);
        return $transaksi;
    }

    /**
     * @param $id
     *
     * @return string
     */
    public function terima($id){
        $transaksi = Transaksi::where([['status','=',1],['user_id','=',auth()->id()]])->find($id);
        if ($transaksi){
            $transaksi->update([
                'status' => 3
            ]);
            return 'berhasil';
        }
        return 'transaksi tidak ditemukan';
    }

}
