@extends('admin.base')

@section('content')
    <div>



        <div class="panel">
            <div class="title">
                <p>Data Klinik</p>
                <a class="btn-utama-soft  rnd " data-bs-toggle="modal" data-bs-target="#modaltambahuser">Klinik Baru <i
                        class="material-icons menu-icon ms-2">add_circle</i></a>
            </div>

            <div class="isi">
                <div class="table">
                    <table id="table_piutang" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama Klinik</th>
                                <th>Alamat</th>
                                <th>No Hp</th>
                                <th>Username</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Klinik Anak Pak Agus</td>
                                <td>Jl. jl men</td>
                                <td>089 750 505 20</td>
                                <td>agus</td>
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

        <!-- Modal -->
        <div class="modal fade" id="modaltambahuser" tabindex="-1" aria-labelledby="modaltambahuser" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modaltambahuser">Tambah Klinik</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Jhony">
                            <label for="nama" class="form-label">Nama Klinik</label>
                        </div>

                        {{-- <label for="role" class="form-label">Role</label>
                        <select class="form-select mb-3" aria-label="Default select example" id="role" name="role">
                            <option selected>Pilih Role</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select> --}}

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control " id="nohp" name="nohp" placeholder="08712345678">
                            <label for="nohp" class="form-label">No. Hp</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="alamat" class="form-control" id="alamat" name="alamat"
                                placeholder="alamat">
                            <label for="floatingInput">Alamat</label>
                        </div>

                        <hr>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nama" name="username" placeholder="Jhony">
                            <label for="nama" class="form-label">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control " id="password" name="password" placeholder="Jhony">
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
    @endsection

    @section('morejs')
        <script src="{{ asset('js/number_formater.js') }}"></script>

        <script>
            $(document).ready(function() {
                $('#table_id').DataTable();
                $('#table_piutang').DataTable();
            });
        </script>
    @endsection


    </body>

    </html>
