@extends('admin.base')

@section('content')
    <div>


        <div class="panel">
            <div class="title">
                <p>Data Klinik</p>
                <a class="btn-utama-soft  rnd " id="addData">Klinik Baru <i
                        class="material-icons menu-icon ms-2">add_circle</i></a>
            </div>

            <div class="isi">
                <div class="table">
                    <table id="table_id" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Klinik</th>
                            <th>Alamat</th>
                            <th>No Hp</th>
{{--                            <th>Nama</th>--}}
                            <th>Username</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>

                    </table>
                </div>
            </div>

        </div>

        <!-- Modal -->
        <div class="modal fade" id="modaltambahuser" tabindex="-1" aria-labelledby="modaltambahuser" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modaltambahuser">Tambah Klinik</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="form" onsubmit="return createData()">
                        @csrf
                        <input id="id" name="id" class="textForm" hidden >
                        <div class="modal-body">

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control textForm" id="nama_klinik" name="nama_klinik" placeholder="Jhony">
                                <label for="nama_klinik" class="form-label">Nama Klinik</label>
                            </div>

                            {{-- <label for="role" class="form-label">Role</label>
                            <select class="form-select mb-3" aria-label="Default select example" id="role" name="role">
                                <option selected>Pilih Role</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select> --}}

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control textForm " id="no_hp" name="no_hp" required placeholder="08712345678">
                                <label for="no_hp" class="form-label">No. Hp</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="alamat" class="form-control textForm" id="alamat" name="alamat" required
                                       placeholder="alamat">
                                <label for="floatingInput">Alamat</label>
                            </div>

                            <hr>
{{--                            <div class="form-floating mb-3">--}}
{{--                                <input type="text" class="form-control textForm" id="nama" name="nama" placeholder="Jhony">--}}
{{--                                <label for="nama" class="form-label">Nama</label>--}}
{{--                            </div>--}}
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control textForm" id="username" name="username" placeholder="Jhony">
                                <label for="username" class="form-label">Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control textForm " id="password" name="password" placeholder="Jhony">
                                <label for="password" class="form-label">Password</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control textForm " id="password_confirmation"
                                       name="password_confirmation" placeholder="Jhony">
                                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
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
                $(document).ready(function () {
                    datatable();
                });

                function datatable() {
                    var url = window.location.pathname + '/datatable';
                    $('#table_id').DataTable({
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
                                "data": "klinik.nama_klinik",
                                "name": "klinik.nama_klinik"
                            },
                            {
                                "data": "klinik.alamat",
                                "name": "klinik.alamat"
                            },
                            {
                                "data": "klinik.no_hp",
                                "name": "klinik.no_hp"
                            },
                            // {
                            //     "data": "nama",
                            //     "name": "nama"
                            // },
                            {
                                "data": "username",
                                "name": "username"
                            },
                            {
                                "data": "id",
                                "render": function (data, type, row) {
                                    let string = JSON.stringify(row);
                                    return "<div class='d-flex'>\n" +
                                        "<a class='btn-success-soft sml rnd me-2' data-id='" +
                                        data + "' data-row='" + string +
                                        "' id='editData'> <i class='material-icons menu-icon'>edit</i></a>" +
                                        "<a class='btn-danger-soft sml rnd' data-id='" +
                                        data + "' data-name='" + row.nama + "' id='deleteData'> <i class='material-icons menu-icon'>delete</i></a>" +
                                        "</div>";
                                }
                            },
                        ]
                    });
                }

                $(document).on('click', '#addData, #editData', function () {
                    let row = $(this).data('row');
                    console.log(row);
                    $('.textForm').val('');
                    if (row) {
                        $.each(row, function (v, k) {
                            if (row[v] && typeof row[v] === 'object') {
                                    $.each(row[v], function (val, key) {
                                        if (val != 'id'){
                                            $('#' + [val]).val(row[v][val])
                                        }
                                    })
                                }else{
                                    $('#' + v).val(row[v])
                                }
                            }
                        )
                        $('#password').val('*******');
                        $('#password_confirmation').val('*******');
                    }
                    $('#modaltambahuser').modal('show');
                })

                function createData() {
                    saveData('Save Data', 'form', window.location.pathname, afterSave);
                    return false;
                }

                function afterSave() {
                    $('#modaltambahuser').modal('hide');
                    datatable();
                }
            </script>
            @endsection


            </body>

            </html>
