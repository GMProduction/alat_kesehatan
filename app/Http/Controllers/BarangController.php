<?php

namespace App\Http\Controllers;

use App\Helper\CustomController;
use App\Models\Barang;
use App\Models\Stok;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Yajra\DataTables\Facades\DataTables;

class BarangController extends CustomController
{

    function datatable()
    {
        return DataTables::of(Barang::query())->make(true);
    }

    function datatableDetail($id)
    {
        return DataTables::of(Stok::where('barang_id', $id)->get())->make(true);
    }

    /**
     * @return mixed
     */
    public function countBarang(){
        return Barang::count('*');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response|string
     */
    public function index()
    {
        if (\request()->isMethod('POST')){
            if (\request('action') == 'barang'){
                return $this->create();
            }else{
                return $this->createStok();
            }
        }
        return view('admin.barang', ['sidebar' => 'barang']);
    }

    /**
     * @return string
     */
    public function create()
    {
        //
        $field = \request()->validate(
            [
                'nama_barang' => 'required',
            ]
        );

        $foto = \request('foto');

        if ($foto) {
            $image     = $this->generateImageName('foto');
            $stringImg = '/images/barang/'.$image;
            $this->uploadImage('foto', $image, 'imageBarang');
            Arr::set($field, 'foto', $stringImg);
        }
        if (\request('id')){
            $barang = Barang::find(\request('id'));
            if ($foto){
                if ($barang && $barang->foto){
                    if (file_exists('../public'.$barang->foto)) {
                        unlink('../public'.$barang->foto);
                    }
                }
            }
            $barang->update($field);
        }else{
            Arr::set($field,'qty',0);
            $barang = new Barang();
            $barang->create($field);
        }

        return 'berhasil';
    }

    /**
     * @return string
     */
    public function createStok()
    {
        //
        $field = \request()->validate([
            'barang_id' => 'required',
            'qty' => 'required',
            'catatan' => 'required',
            'tanggal_expired' => 'required',
            'tanggal_masuk'  => 'required',
        ]);
        if (\request('id')){
            $stok = Stok::find(\request('id'));
            $selisih = $field['qty'] - $stok->qty;

            $barang = Barang::find($field['barang_id']);
            $sisa = $barang->qty;
            $stokMasuk = $field['qty'];
            $hasilStok = $sisa + $selisih;

            $barang->update([
                'qty' => $hasilStok
            ]);
            $stok->update($field);

        }else{
            $stok = new Stok();
            $stok->create($field);

            $barang = Barang::find($field['barang_id']);
            $sisa = $barang->qty;
            $stokMasuk = $field['qty'];
            $hasilStok = (int) $sisa + (int) $stokMasuk;
            $barang->update([
                'qty' => $hasilStok
            ]);
        }

        return 'berhasil';
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
