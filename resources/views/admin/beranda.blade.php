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
                                        <p class="nilai">{{$barang}}</p>
                                        {{-- <p class="status">75% naik</p> --}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="panel-peformace">
                                    <img src="{{ asset('images/local/klinik.png') }}" />
                                    <div class="content">
                                        <p class="nama">Data Klinik</p>
                                        <p class="nilai">{{$klinik}}</p>
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


            </div>


        </div>

    </div>
@endsection

@section('morejs')
    <script src="{{ asset('js/number_formater.js') }}"></script>

    <script>

    </script>
@endsection


</body>

</html>
