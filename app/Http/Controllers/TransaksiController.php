<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Stok;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Yajra\DataTables\Facades\DataTables;

class TransaksiController extends Controller
{

    function datatable()
    {
        return DataTables::of(Transaksi::query())->make(true);
    }

    function datatableDetail($id)
    {
        $transaksi = Keranjang::with('barang')->where('transaksi_id', '=', $id)->get();

        return DataTables::of($transaksi)->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.transaksi', ['sidebar' => 'transaksi']);
    }

    public function updateQty()
    {
        $keranjang = Keranjang::find(\request('id'));
        $keranjang->update(
            [
                'qty_disetujui' => \request('qty_diterima'),
            ]
        );

        return 'berhasil';
    }

    public function updateStatus()
    {
        $keranjang = Keranjang::find(\request('id'));

        $keranjang->update(
            [
                'status' => \request('status'),
            ]
        );

        return 'berhasil';

    }

    // public function cetakLaporan($id)
    // {
    //     $pdf = App::make('dompdf.wrapper');
    //     $pdf->loadHTML('<h1>Test</h1>');
    //     return $pdf->stream();
    // }

    public function cetakLaporan($id)
    {
//        return $this->dataTransaksi();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->dataTransaksi())->setPaper('f4', 'potrait');

        return $pdf->stream();
    }

    public function dataTransaksi()
    {
        return view('admin/laporanpesanan')->with("");
    }

    public function konfirmasi()
    {
        $cart = Keranjang::with('barang')->where([['transaksi_id', '=', \request('id')],['status','=',0]])->get();
        if (count($cart) > 0){
            return response()->json(
                [
                    'msg' => 'Silahkan konfirmasi keranjang',
                ],
                202
            );
        }
        $cart       = Keranjang::with('barang')->where([['transaksi_id', '=', \request('id')],['status','=',1]])->get();

        foreach ($cart as $key => $c) {
            $stok = Stok::where('barang_id', '=', $c->barang_id)->orderBy('tanggal_expired', 'ASC')->get();
            $sisaKeluar = 0;
            $keluar = $c->qty_disetujui;
            $hasilStok = 0;
            $stokBarang = $c->barang->qty;
            $hasilStok = $stokBarang - $keluar;
            foreach ($stok as $s) {
                $sisa   = $s->qty;
                if ($sisaKeluar == 0){
                    if ($sisa >= $keluar) {
                        $hasil = $sisa - $keluar;
                        $s->update([
                            'qty' => $hasil
                        ]);
                    }else{
                        $sisaKeluar = $sisa % $keluar;

                        $s->update([
                            'qty' => 0
                        ]);
                    }
                }else{
                    if ($sisa >= $sisaKeluar){
                        $hasil = $sisa - $sisaKeluar;
                        $s->update([
                            'qty' => $hasil
                        ]);
                    }else{
                        $sisaKeluar = $sisa % $sisaKeluar;
                        $s->update([
                            'qty' => 0
                        ]);
                    }
                }
            }
            $c->barang()->update([
                'qty' => $hasilStok,
            ]);
        }

        $trans = Transaksi::find(\request('id'));
        $trans->update([
            'status' => 1
        ]);
        return 'berhasil';
    }

}
