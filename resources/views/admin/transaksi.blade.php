@extends('admin.base')

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
                                        {{-- <th>Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody class="select">
                                    <tr>
                                        <td>1</td>
                                        <td>Klinik Anak Pak Joko</td>
                                        <td>12 Juni 2022</td>
                                        {{-- <td>Pesan banyak</td> --}}
                                        <td>2011-04-25</td>
                                        {{-- <td class="d-flex ">
                                            <a class="btn-utama sml rnd me-1 d-flex justify-content-center"
                                                data-bs-toggle="modal" data-bs-target="#detailTransaksi">Detail <i
                                                    class="material-icons menu-icon ms-2">info</i></a>


                                        </td> --}}
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
                        <p>Detail</p>
                        {{-- <a class="btn-utama-soft  rnd ">Pesanan Baru <i
                            class="material-icons menu-icon ms-2">add_circle</i></a> --}}

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
                                    <textarea class="form-control" placeholder="Leave a comment here" id="dt_alamat" disabled style="height: 100px"></textarea>
                                    <label for="dt_alamat">Catatan</label>
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
                                    <tr>
                                        <td>1</td>
                                        <td>Bed</td>
                                        <td>5</td>
                                        <td>Pending</td>
                                        <td>5</td>
                                        <td class="d-flex ">
                                            <a class="btn-utama sml rnd me-1 d-flex justify-content-center"
                                                data-bs-toggle="modal" data-bs-target="#modalChangeQty">Ganti Qty <i
                                                    class="material-icons menu-icon ms-2">info</i></a>

                                            <a class="btn-success sml rnd me-1 d-flex justify-content-center">Terima <i
                                                    class="material-icons menu-icon ms-2">check_circle</i></a>

                                            <a class="btn-danger sml rnd me-1 d-flex justify-content-center">Tolak <i
                                                    class="material-icons menu-icon ms-2">dangerous</i></a>

                                        </td>
                                    </tr>

                                </tbody>

                            </table>
                        </div>
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
                    <div class="modal-body">

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="qty_diminta" name="qty_diminta"
                                placeholder="qty_diminta" disabled>
                            <label for="qty_diminta" class="form-label">Jumlah yang diminta</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="qty_diterima" name="qty_diterima"
                                placeholder="qty_diterima">
                            <label for="qty_diterima" class="form-label">Jumlah yang disetujui</label>
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
    </div>
@endsection

@section('morejs')
    <script src="{{ asset('js/number_formater.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#table_id').DataTable({
                select: {
                    style: 'single'
                }
            });

            $('#table_detail').DataTable();
        });
    </script>
@endsection


</body>

</html>
