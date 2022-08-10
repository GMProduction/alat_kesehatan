@extends('admin.base')

@section('title')
Transaksi
@endsection
@section('content')
    <div> 

        <div class="row">
            <div class="col-4">


                <div class="panel">
                    <div class="title">
                        <p>Pesanan Terbaru</p>
                        {{-- <a class="btn-utama-soft  rnd ">Pesanan Baru <i
                                class="material-icons menu-icon ms-2">add_circle</i></a> --}}
                    </div>

                    <div class="isi">
                        <div class="table">
                            <table id="table_id" class="table table-striped" style="width:100%">
                                <thead>
                                <tr>
                                    <th>No Transaksi</th>
                                    <th>Nama Klinik</th>
                                    <th>Tanggal</th>
                                    {{-- <th>Catatan</th> --}}
                                    <th>Status Pesanan</th>
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
                        <p>Detail</p>
                        <a class="btn-accent rnd d-none" id="btnCetak">Cetak <i
                                class="material-icons menu-icon ms-2">print</i></a>

                    </div>

                    <div class="isi">
                        <div class="row">
                            <div class="col-4">
                                <p class="fw-bold">Data Transaksi</p>

                                <div class="form-floating mb-1">
                                    <input type="text" class="form-control" id="dt_tanggal" name="dt_tanggal" disabled
                                           placeholder="no_hp">
                                    <label for="dt_tanggal" class="form-label">Tanggal</label>
                                </div>

                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="dt_catatan" disabled style="height: 100px"></textarea>
                                    <label for="dt_catatan">Catatan</label>
                                </div>

                            </div>
                            <div class="col-4">
                                <p class="fw-bold">Data Klinik</p>
                                <div class="form-floating mb-1">
                                    <input type="text" class="form-control" id="dk_namaklinik" disabled
                                           name="dk_namaklinik" placeholder="Klinik">
                                    <label for="dk_namaklinik" class="form-label">Nama Klinik</label>
                                </div>

                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="dk_alamat" disabled style="height: 100px"></textarea>
                                    <label for="dk_alamat">Alamat</label>
                                </div>


                            </div>

                            <div class="col-4">
                                <p class="fw-bold">.</p>


                                <div class="form-floating mb-1">
                                    <input type="text" class="form-control" id="dk_username" name="dk_username" disabled
                                           placeholder="Klinik">
                                    <label for="dk_username" class="form-label">Username</label>
                                </div>

                                <div class="form-floating mb-1">
                                    <input type="text" class="form-control" id="dk_nohpklinik" name="dk_nohpklinik"
                                           disabled placeholder="no_hp">
                                    <label for="dk_nohpklinik" class="form-label">No Hp</label>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>

                <div class="panel">
                    <div class="title">
                        <p>Data Barang yang dipesan</p>
                        {{-- <a class="btn-utama-soft  rnd ">Pesanan Baru <i
                                class="material-icons menu-icon ms-2">add_circle</i></a> --}}
                    </div>

                    <div class="isi">
                        <div class="table">
                            <table id="table_detail" class="table table-striped" style="width:100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                    <th>Qty disetujui</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <a id="btnSimpan" class="btn-success-soft rnd d-none" style="justify-content: center">Simpan</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="detailTransaksi" tabindex="-1" aria-labelledby="detailTransaksi" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="titleDetailTransaksi">Tambah User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">


                        <label for="role" class="form-label">Role</label>
                        <select class="form-select mb-3" aria-label="Default select example" id="role"
                                name="role">
                            <option selected>Pilih Role</option>
                            <option value="admin">Admin</option>
                            <option value="pimpinan">Pimpinan</option>
                        </select>


                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nama" name="username"
                                   placeholder="Jhony">
                            <label for="nama" class="form-label">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control " id="password" name="password"
                                   placeholder="Jhony">
                            <label for="password" class="form-label">Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control " id="password_confirmation"
                                   name="password_confirmation" placeholder="Jhony">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
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

        <!-- Modal -->
        <div class="modal fade" id="modalChangeQty" tabindex="-1" aria-labelledby="modalChangeQty" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="titlemodalChangeQty">Ganti Jumlah yang disetujui</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="formQty" onsubmit="return updateQty()">
                        @csrf
                        <input name="id" id="id" hidden>
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="qty_diminta" name="qty_diminta"
                                       placeholder="qty_diminta" disabled>
                                <label for="qty_diminta" class="form-label">Jumlah yang diminta</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="qty_tersedia" name="qty_tersedia"
                                       disabled>
                                <label for="qty_tersedia" class="form-label">Sisa stok tersedia</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="qty_diterima" name="qty_diterima"
                                       placeholder="qty_diterima">
                                <label for="qty_diterima" class="form-label">Jumlah yang disetujui</label>
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
    </div>
@endsection

@section('morejs')
    <script src="{{ asset('js/number_formater.js') }}"></script>

    <script>
        let idTrans;
        $(document).ready(function () {

            datatableTransaksi();
        });

        function datatableTransaksi() {
            var url = window.location.pathname + '/datatable';
            $('#table_id').DataTable({
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
                        "data": "id",
                        "name": "id"
                    },
                    {
                        "data": "user.klinik.nama_klinik",
                        "name": "user.klinik.nama_klinik"
                    },
                    {
                        "data": "tanggal",
                        "name": "tanggal"
                    },
                    {
                        "data": "status",
                        "name": "status",
                        "render": function (data) {
                            return data == 1 ? 'Dikirim' : data == 3 ? 'Diterima' : 'Menunggu';
                        }
                    },
                    {
                        "data": "id",
                        "render": function (data, type, row) {
                            let string = JSON.stringify(row);
                            return "<div class='d-flex'>\n" +
                                "<a class='btn-success-soft sml rnd me-2' data-id='" +
                                data + "' data-row='" + string +
                                "' id='checkData'> <i class='material-icons menu-icon'>remove_red_eye</i></a>" +
                                "</div>";
                        }
                    },
                ]
            });
        }

        $(document).on('click', '#checkData', function () {
            let row = $(this).data('row');
            console.log(row);
            $('#dt_tanggal').val(row.tanggal);
            $('#dt_catatan').val(row.keterangan);
            $('#dk_namaklinik').val(row.user.klinik.nama_klinik);
            $('#dk_alamat').val(row.user.klinik.alamat);
            $('#dk_username').val(row.user.username);
            $('#dk_nohpklinik').val(row.user.klinik.no_hp);
            $('#btnSimpan').addClass('d-none');
            $('#btnCetak').addClass('d-none');
            if(row.status != 0){
                $('#btnCetak').removeClass('d-none').attr('data-id',row.id);
            }
            if (row.status == 0) {
                $('#btnSimpan').removeClass('d-none');
                if ('{{auth()->user()->role == 'admin'}}') {
                    $('#btnSimpan').addClass('d-none');
                }
            }
            idTrans = row.id;
            datatableDetail(idTrans);
        })

        function datatableDetail(id) {
            var url = window.location.pathname + '/datatable/' + id;
            $('#table_detail').DataTable({
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
                        "data": "barang.nama_barang",
                        "name": "barang.nama_barang"
                    },
                    {
                        "data": "qty",
                        "name": "qty"
                    },
                    {
                        "data": "status",
                        "name": "status",
                        "render": function (data) {
                            return data == 1 ? 'Diterima' : data == 2 ? 'Ditolak' : 'Menunggu'
                        }
                    },
                    {
                        "data": "qty_disetujui",
                        "name": "qty_disetujui"
                    },
                    {
                        "data": "id",
                        "render": function (data, type, row) {
                            let string = JSON.stringify(row);
                            let btn = '<span>Selesai</span>';
                            if (row.status == 0) {

                                btn = " <a class='btn-utama sml rnd me-1 d-flex justify-content-center' id='gantiQty' data-stok='" + row.barang.qty + "' data-id='" + data + "' data-qty='" + row.qty + "'>Ganti Jumlah yang disetujui <i\n" +
                                    "                                                class='material-icons menu-icon ms-2'>info</i></a>\n" +
                                    "\n" +
                                    "                                        <a class='btn-success sml rnd me-1 d-flex justify-content-center' data-qty='" + row.qty_disetujui + "' onclick='updateStatus(this," + row.id + ",1)'>Terima <i\n" +
                                    "                                                class='material-icons menu-icon ms-2'>check_circle</i></a>\n" +
                                    "\n" +
                                    "                                        <a class='btn-danger sml rnd me-1 d-flex justify-content-center' data-qty='" + row.qty_disetujui + "'  onclick='updateStatus(this," + row.id + ",2)'>Tolak <i\n" +
                                    "                                                class='material-icons menu-icon ms-2'>dangerous</i></a>"

                                if ('{{auth()->user()->role == 'admin'}}') {
                                    btn = '<span>Hanya pimpinan</span>';
                                }
                            }
                            return "<div class='d-flex'>" + btn +
                                "</div>";
                        }
                    },
                ]
            });
        }

        $(document).on('click', '#btnSimpan', function () {
            let form = {
                '_token': '{{csrf_token()}}',
                'id': idTrans
            }
            saveDataObjectFormData('Konfirmasi pemesanan', form, window.location.pathname + '/keranjang/konfirmasi', afterConfirm);
            return false;
        })

        function afterConfirm() {
            datatableTransaksi();
            $('#btnSimpan').addClass('d-none');
            $('#btnCetak').removeClass('d-none');

        }

        $(document).on('click','#btnCetak', function () {
            let id = $(this).data('id');
            $(this).attr('href',window.location.pathname+'/cetak/'+id).attr('target','_blank');
        });

        $(document).on('click', '#gantiQty', function () {
            $('#modalChangeQty #qty_diminta').val($(this).data('qty'));
            $('#modalChangeQty #qty_diterima').val(0);
            $('#modalChangeQty #qty_tersedia').val($(this).data('stok'));
            $('#modalChangeQty #id').val($(this).data('id'));
            $('#modalChangeQty').modal('show');
        })

        function updateQty() {
            let stok = $('#formQty #qty_tersedia').val();
            let qty = $('#formQty #qty_diterima').val();
            console.log(stok);
            console.log(qty);
            if (parseInt(stok) < parseInt(qty)) {
                swal("Jumlah stok tidak cukup ", {
                    icon: "info",
                    // buttons: false,
                    timer: 1000
                });
                return false;
            }
            saveData('Update data', 'formQty', window.location.pathname + '/keranjang/update-qty', afterUpdate)
            return false;
        }

        function afterUpdate() {
            datatableDetail(idTrans);
            $('#modalChangeQty').modal('hide');
        }

        function updateStatus(a, id, status) {
            let text = 'Terima';
            if (status == 2) {
                text = 'Tolak';
            }
            if (status == 1 && $(a).data('qty') == 0) {
                swal("Silahkan masukkan qty yang disetujui ", {
                    icon: "info",
                    // buttons: false,
                    timer: 1000
                });
                return false;
            }
            let form = {
                '_token': '{{csrf_token()}}',
                'id': id,
                'status': status
            };
            saveDataObjectFormData(text + ' Pesanan', form, window.location.pathname + '/keranjang/update-status', afterUpdate);
            return false;
        }
    </script>
    @endsection


    </body>

    </html>
