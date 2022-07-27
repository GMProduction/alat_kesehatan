<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BerandaController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $klinik = new KlinikController();
        $barang = new BarangController();
        $countKlinik = $klinik->countKlinik();
        $countBarang = $barang->countBarang();
        return view('admin.beranda', ['sidebar' => 'beranda', 'klinik' => $countKlinik, 'barang' => $countBarang]);
    }

}
