@extends('admin.base')

@section('content')
    <div>

        <div class="row">
            <div class="col-12">
                <div class="panel">
                    <div class="title">
                        <p>Portfolio Peformance</p>
                    </div>

                    <div class="isi">
                        <div class="row">
                            <div class="col-6">
                                <div class="panel-peformace">
                                    <img src="{{ asset('images/local/warehouse.png') }}" />
                                    <div class="content">
                                        <p class="nama">Stok Barang</p>
                                        <p class="nilai">1.245</p>
                                        {{-- <p class="status">75% naik</p> --}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="panel-peformace">
                                    <img src="{{ asset('images/local/klinik.png') }}" />
                                    <div class="content">
                                        <p class="nama">Data Klinik</p>
                                        <p class="nilai">7.5M</p>
                                        {{-- <p class="status">75% naik</p> --}}
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="col-4">
                                <div class="panel-peformace">
                                    <img src="{{ asset('images/local/contoh-logo-bunder.png') }}" />
                                    <div class="content">
                                        <p class="nama">Pendapatan</p>
                                        <p class="nilai">7.5M</p> --}}
                            {{-- <p class="status">75% naik</p> --}}
                            {{-- </div>
                                </div>  
                            </div> --}}
                        </div>

                    </div>

                </div>

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
                                        <th>Catatan</th>
                                        <th>Status Pesanan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Klinik Anak Pak Joko</td>
                                        <td>12 Juni 2022</td>
                                        <td>Pesan banyak</td>
                                        <td>2011-04-25</td>
                                        <td class="d-flex">
                                            <a class="btn-success sml rnd me-1">Edit <i
                                                    class="material-icons menu-icon ms-2">edit</i></a>

                                            <a class="btn-danger sml rnd ">Hapus <i
                                                    class="material-icons menu-icon ms-2">delete</i></a>
                                        </td>
                                    </tr>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </tfoot>
                            </table>
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
            $('#table_id').DataTable();
            $('#table_piutang').DataTable();
        });
    </script>
@endsection


</body>

</html>
