<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Keranjang;
use App\Models\Transaksi;
use Illuminate\Support\Arr;

class CartController extends Controller
{
    public function cart(){

        if (request()->isMethod('POST')){
            return $this->postCart();
        }
        $cart = Keranjang::with('barang')->where('transaksi_id','=',null)->get();
        return $cart;
    }

    public function postCart(){
        request()->validate([
            'barang_id' => 'required',
            'qty' => 'required',

        ]);
        $dataReq = request()->all();
        Arr::set($dataReq,'qty_disetujui',0);
        Arr::set($dataReq,'user_id',auth()->id());

        if (request('id')){
            $cart = Keranjang::where('transaksi_id','=',null)->find(request('id'));
            if ($cart == null){
                return 'Pesanan tidak ditemukan';
            }
            $cart->update($dataReq);
        }else{
            $cart = new Keranjang();
            $cart->create($dataReq);
        }
        return 'berhasil';
    }

    public function checkout(){
        $cart = Keranjang::where([['user_id','=',auth()->id()],['transaksi_id','=',null]])->get();
        if (count($cart) > 0){
            $transaksi = new Transaksi();
            $tsans = $transaksi->create([
                'user_id' => auth()->id(),
                'tanggal' => date('Y-m-d'),
                'keterangan' => request('keterangan'),
            ]);
            foreach ($cart as $c){
                $c->update([
                    'transaksi_id' => $tsans->id
                ]);
            }
            return 'Berhasil';
        }
        return 'Keranjang tidak ditemukan';
    }
}
