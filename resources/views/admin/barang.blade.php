@extends('admin.base')

@section('content')
    <div>


        <div class="row">
            <div class="col-4">
                <div class="panel">
                    <div class="title">
                        <p>Data Barang</p>
                        <a class="btn-utama-soft  rnd " id="addBarang">Tambah
                            Barang
                            <i class="material-icons menu-icon ms-2">add_circle</i></a>
                    </div>

                    <div class="isi">
                        <div class="table">
                            <table id="table_barang" class="table table-striped" style="width:100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Barang</th>
                                    <th>Foto</th>
                                    <th>Qty</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody class="select">


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
                        <a class="btn-utama-soft  rnd d-none" id="addBarangStok">Tambah
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
                    <form id="form" onsubmit="return createData()" enctype="multipart/form-data">
                        @csrf
                        <input name="action" value="barang" hidden>
                        <input id="id" name="id" hidden class="textForm"/>
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control textForm" required id="nama_barang" name="nama_barang"
                                       placeholder="namabarang">
                                <label for="namabarang" class="form-label">Nama Barang</label>
                            </div>

                            <div class="mb-3">
                                <label for="fotobarang" class="form-label">Foto Barang</label>
                                <input class="form-control textForm" type="file" id="foto" name="foto">
                            </div>
                        </div>
                        <div class=" m-3">
                            <div class="text-center">
                                <button type="submit" class="btn-utama">Simpan</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <!-- Modal TAMBAH STOCK-->
        <div class="modal fade" id="modaltambahstock" tabindex="-1" aria-labelledby="modaltambahstock" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="titlemodaltambahstock">Tambah Stock (<span id="namaStok"></span>)</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="formStok" onsubmit="return createStock()">
                        @csrf
                        <input id="id" name="id" class="textForm" hidden/>
                        <input id="barang_id" name="barang_id" hidden/>
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control textForm" id="qty" name="qty" placeholder="qty">
                                <label for="qty" class="form-label">Qty</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="date" class="form-control textForm" id="tanggal_masuk" name="tanggal_masuk" placeholder="tanggalmasuk">
                                <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="date" class="form-control textForm" id="tanggal_expired" name="tanggal_expired" placeholder="tanggalexpired">
                                <label for="tanggal_expired" class="form-label">Tanggal Expired</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control textForm" id="catatan" name="catatan" placeholder="keterangan">
                                <label for="catatan" class="form-label">Keterangan</label>
                            </div>
                        </div>
                        <div class=" m-3">

                            <div class="text-center">
                                <button type="submit" class="btn-utama">Simpan</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        @endsection

        @section('morejs')
            <script src="{{ asset('js/number_formater.js') }}"></script>

            <script>

                var idBarang, namaBarang;
                $(document).ready(function () {
                    $('#table_id').DataTable();
                    // $('#table_barang').DataTable({
                    //     select: {
                    //         style: 'single'
                    //     }
                    // });
                    $('.datepicker').datepicker();
                    datatable();
                });

                // $(document).on('click','.select', function (ev) {
                //     console.log('asdsa', ev)
                // })

                function datatable() {
                    var url = window.location.pathname + '/datatable';

                    let table = $('#table_barang').DataTable({
                        destroy: true,
                        processing: true,
                        serverSide: true,
                        ajax: url,
                        "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                            // debugger;
                            var numStart = this.fnPagingInfo().iStart;
                            var index = numStart + iDisplayIndexFull + 1;
                            // var index = iDisplayIndexFull + 1;
                            $("td:first", nRow).html(index);
                            return nRow;
                        },
                        columns: [
                            {
                                "className": '',
                                "orderable": false,
                                "defaultContent": ''
                            },
                            {
                                "data": "nama_barang",
                                "name": "nama_barang"
                            },
                            {
                                "data": "foto",
                                render: function (data) {
                                    return '<img src="' + data + '" width="50" height="50"/>'
                                }
                            },
                            {
                                "data": "qty",
                                "name": "qty"
                            },

                            {
                                "data": "id",
                                "render": function (data, type, row) {
                                    let string = JSON.stringify(row);
                                    return "<div class='d-flex'>\n" +
                                        "<a class='btn-success-soft sml rnd me-2' data-id='" +
                                        data + "' data-row='" + string +
                                        "' id='editBarang'> <i class='material-icons menu-icon'>edit</i></a>" +
                                        "<a class='btn-danger-soft sml rnd me-2' data-id='" +
                                        data + "' data-name='" + row.nama_barang + "' id='deleteData'> <i class='material-icons menu-icon'>delete</i></a>" +
                                        "<a class='btn-accent sml rnd me-2' data-id='" +
                                        data + "' data-name='" + row.nama_barang + "' id='editStok'> <i class='material-icons menu-icon'>remove_red_eye</i></a>" +
                                        "</div>";
                                }
                            },
                        ]
                    });

                }

                function datatableStok(id) {
                    var url = window.location.pathname + '/datatable/' + id;

                    let table = $('#table_stock').DataTable({
                        destroy: true,
                        processing: true,
                        serverSide: true,
                        ajax: url,
                        // "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                        //     // debugger;
                        //     var numStart = this.fnPagingInfo().iStart;
                        //     var index = numStart + iDisplayIndexFull + 1;
                        //     // var index = iDisplayIndexFull + 1;
                        //     $("td:first", nRow).html(index);
                        //     return nRow;
                        // },
                        columns: [
                            {
                                "data": "tanggal_masuk",
                                "name": "tanggal_masuk",
                                render: function (data) {
                                    return moment(data).format('LL')
                                }
                            },
                            {
                                "data": "tanggal_expired",
                                "name": "tanggal_expired",
                                render: function (data) {
                                    return moment(data).format('LL')
                                }
                            },
                            {
                                "data": "catatan",
                                "name": "catatan"
                            },
                            {
                                "data": "qty",
                                "name": "qty"
                            },
                            {
                                "data": "id",
                                "render": function (data, type, row) {
                                    let string = JSON.stringify(row);
                                    return "<div class='d-flex'>\n" +
                                        "<a class='btn-success-soft sml rnd me-2' data-id='" +
                                        data + "' data-row='" + string +
                                        "' id='editBarangStok'> <i class='material-icons menu-icon'>edit</i></a>" +
                                        "<a class='btn-danger-soft sml rnd me-2' data-id='" +
                                        data + "' data-name='" + row.nama + "' id='deleteData'> <i class='material-icons menu-icon'>delete</i></a>" +
                                        "</div>";
                                }
                            },
                        ]
                    });

                }

                $(document).on('click', '#editStok', function () {
                    idBarang = $(this).data('id');
                    namaBarang = $(this).data('name');
                    console.log(namaBarang)
                    $('#formStok #barang_id').val(idBarang);
                    $('#namaStok').html(namaBarang);
                    $('#addBarangStok').removeClass('d-none');
                    datatableStok(idBarang);
                })

                function createStock() {
                    saveData('Save Data Stok '+namaBarang, 'formStok', window.location.pathname, afterSaveStok);
                    return false;
                }

                function afterSaveStok(){
                    $('#modaltambahstock').modal('hide');
                    datatableStok(idBarang);
                    datatable();
                }

                $(document).on('click', '#addBarangStok, #editBarangStok', function () {
                    let row = $(this).data('row');
                    $('.textForm').val('');
                    if (row) {
                        $.each(row, function (v, k) {
                            $('#formStok #' + v).val(row[v])
                        })
                    }
                    $('#modaltambahstock').modal('show')
                })

                $(document).on('click', '#addBarang, #editBarang', function () {
                    let row = $(this).data('row');
                    $('.textForm').val('');
                    if (row) {
                        $('#id').val(row.id)
                        $('#nama_barang').val(row.nama_barang)
                    }
                    $('#modaltambahbarang').modal('show')
                })

                function createData() {
                    saveData('Save Data', 'form', window.location.pathname, afterSave);
                    return false;
                }

                function afterSave() {
                    $('#modaltambahbarang').modal('hide');
                    datatable();
                }
            </script>
            @endsection


            </body>

            </html>
