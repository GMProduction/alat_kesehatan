@extends('admin.base')

@section('content')
    <div>


        <div class="row">
            <div class="col-4">
                <div class="panel">
                    <div class="title">
                        <p>Data Barang</p>
                        <a class="btn-utama-soft  rnd " data-bs-toggle="modal" data-bs-target="#modaltambahbarang">Tambah
                            Barang
                            <i class="material-icons menu-icon ms-2">add_circle</i></a>
                    </div>

                    <div class="isi">
                        <div class="table">
                            <table id="table_barang" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <th>Foto</th>
                                        <th>Qty</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="select">
                                    <tr>
                                        <td>Bed</td>
                                        <td><img class="" src="{{ asset('images/local/klinik.png') }}" /></td>
                                        <td>10</td>
                                        <td class="d-flex">
                                            <a class="btn-success sml rnd me-1">Edit <i
                                                    class="material-icons menu-icon ms-2">edit</i></a>
                                            {{-- <a class="btn-accent sml rnd ">Tambah Stock <i
                                                    class="material-icons menu-icon ms-2">note_add</i></a> --}}
                                        </td>
                                    </tr>


                                </tbody>

                            </table>
                        </div>
                    </div>

                </div>


            </div>

            <div class="col-8">
                <div class="panel">
                    <div class="title">
                        <p>Nama Barang (Total Qty)</p>
                        <a class="btn-utama-soft  rnd " data-bs-toggle="modal" data-bs-target="#modaltambahstock">Tambah
                            Stock
                            <i class="material-icons menu-icon ms-2">add_circle</i></a>
                    </div>

                    <div class="isi">
                        <div class="table ">
                            <table id="table_stock" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Tanggal Masuk</th>
                                        <th>Tanggal Expired</th>
                                        <th>Keterangan</th>
                                        <th>Qty</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="select">
                                    <tr>
                                        <td>12 Juni 2022</td>
                                        <td>12 Juni 2025</td>
                                        <td>Bed dikirim dari australia</td>
                                        <td>5</td>
                                        <td class="d-flex">
                                            <a class="btn-success sml rnd me-1">Edit <i
                                                    class="material-icons menu-icon ms-2">edit</i></a>
                                            <a class="btn-danger sml rnd ">Hapus <i
                                                    class="material-icons menu-icon ms-2">delete</i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>10 Juni 2022</td>
                                        <td>10 Juni 2026</td>
                                        <td>Bed dikirim dari australia</td>
                                        <td>5</td>
                                        <td class="d-flex">
                                            <a class="btn-success sml rnd me-1">Edit <i
                                                    class="material-icons menu-icon ms-2">edit</i></a>
                                            <a class="btn-danger sml rnd ">Hapus <i
                                                    class="material-icons menu-icon ms-2">delete</i></a>
                                        </td>
                                    </tr>

                                </tbody>

                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <!-- Modal TAMBAH BARANG-->
        <div class="modal fade" id="modaltambahbarang" tabindex="-1" aria-labelledby="modaltambahbarang"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="titlemodaltambahbarang">Tambah Master Barang</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">


                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="namabarang" name="namabarang"
                                placeholder="namabarang">
                            <label for="namabarang" class="form-label">Nama Barang</label>
                        </div>

                        <div class="mb-3">
                            <label for="fotobarang" class="form-label">Foto Barang</label>
                            <input class="form-control" type="file" id="fotobarang">
                        </div>




                    </div>

                    <div class=" m-3">

                        <div class="text-center">
                            <a class="btn-utama">Simpan</a>
                        </div>


                    </div>

                </div>
            </div>
        </div>

        <!-- Modal TAMBAH STOCK-->
        <div class="modal fade" id="modaltambahstock" tabindex="-1" aria-labelledby="modaltambahstock" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="titlemodaltambahstock">Tambah Stock (Nama Barang)</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">


                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="qty" name="qty" placeholder="qty">
                            <label for="qty" class="form-label">Qty</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="tanggalmasuk" name="Tanggal Masuk" placeholder="tanggalmasuk">
                            <label for="tanggalmasuk" class="form-label">Tanggal Masuk</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="tanggalexpired" name="Tanggal Masuk" placeholder="tanggalexpired">
                            <label for="tanggalexpired" class="form-label">Tanggal Expired</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="keterangan">
                            <label for="keterangan" class="form-label">Keterangan</label>
                        </div>




                    </div>

                    <div class=" m-3">

                        <div class="text-center">
                            <a class="btn-utama">Simpan</a>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    @endsection

    @section('morejs')
        <script src="{{ asset('js/number_formater.js') }}"></script>

        <script>
            $(document).ready(function() {
                $('#table_id').DataTable();
                $('#table_barang').DataTable({
                    select: {
                        style: 'single'
                    }
                });
                $('#table_stock').DataTable();
                $('.datepicker').datepicker();
            });
        </script>
    @endsection


    </body>

    </html>
