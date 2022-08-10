<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Print Card</title>
    <!-- Fonts -->

    <!-- Styles -->
    <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="{{ asset('bootsrap/css/bootstrap/bootstrap.css') }}" type="text/css"> --}}


</head>

<body>
<style type="text/css">
    @page {
        margin: 20px;
    }

    /* * { padding: 0; margin: 0; } */
    @font-face {
        font-family: "source_sans_proregular";
        src: local("Source Sans Pro"), url("fonts/sourcesans/sourcesanspro-regular-webfont.ttf") format("truetype");
        font-weight: normal;
        font-style: normal;

    }

    body {
        font-family: "source_sans_proregular", Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif;
    }
</style>

<style>


    footer {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        height: 0;
    }

    table {
        border: 1px solid #ccc;
        border-collapse: collapse;
        margin: 0;
        padding: 0;
        width: 100%;
        table-layout: fixed;
    }

    table caption {
        font-size: 1.5em;
        margin: .5em 0 .75em;
    }

    table tr {
        border: 1px solid #ddd;
        padding: .35em;
    }

    table th,
    table td {
        padding: .625em;
        text-align: center;
        vertical-align: top
    }

    table th,
    table td {
        font-size: .8em;
        letter-spacing: .1em;
        /* text-transform: uppercase; */
    }

    @media screen and (max-width: 600px) {
        table {
            border: 0;

        }

        table caption {
            font-size: 1.3em;
        }

        table thead {
            border: none;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
        }

        table tr {
            border-bottom: 3px solid #ddd;
            display: block;
            margin-bottom: .625em;
        }

        table td {
            border-bottom: 1px solid #ddd;
            display: block;
            font-size: .6em;
            text-align: right;
        }

        table td::before {
            content: attr(data-label);
            float: left;
            font-weight: bold;
            text-transform: uppercase;
        }

        table td:last-child {
            border-bottom: 0;
        }
    }

    .text-center {
        text-align: center !important;
    }

    .text-left {
        text-align: left !important;
    }
</style>

<br>

<div>
    {{-- <img src="{{ public_path('static-image/logo.png') }}" style="width: 120px; float: left;" /> --}}

    <div>
        <h4 style=" text-align: center;margin-bottom:10px ;margin-top:0">LAPORAN PESANAN</h4>

        <table style="border: 0">
            <tr style="border: 0">
                <td>
                    <div>
                        <table style=" table-layout: auto">
                            <tr style="border: 0">
                                <td class="text-left" style="font-weight: bold; font-size: 1rem" colspan="3">
                                    Data Transaksi
                                </td>

                            </tr>
                            <tr style="border: 0">
                                <td class="text-left">
                                    No. Transaksi
                                </td>
                                <td class="text-left" style="width: 10px !important; ">
                                    :
                                </td>
                                <td class="text-left">
                                    {{$data->id}}
                                </td>
                            </tr>
                            <tr style="border: 0">
                                <td class="text-left">
                                    Tanggal Pesanan
                                </td>
                                <td class="text-left" style="width: 10px !important;">
                                    :
                                </td>
                                <td class="text-left">
                                    {{$data->tanggal}}
                                </td>

                            </tr>
                            <tr style="border: 0">
                                <td class="text-left">
                                    Catatan Dari Klinik
                                </td>
                                <td class="text-left" style="width: 10px !important; ">
                                    :
                                </td>
                                <td class="text-left">
                                    {{$data->keterangan}}
                                </td>

                            </tr>
                        </table>
                    </div>
                </td>
                <td>
                    <table style="border: 1px solid #ccc; table-layout: auto">
                        <tr style="border: 0">
                            <td class="text-left" style="font-weight: bold; font-size: 1rem" colspan="3">
                                Data Klinik
                            </td>

                        </tr>
                        <tr style="border: 0">
                            <td class="text-left">
                                Nama Klinik
                            </td>
                            <td class="text-left" style="width: 10px !important; ">
                                :
                            </td>
                            <td class="text-left">
                                {{$data->user->klinik->nama_klinik}}
                            </td>
                        </tr>
                        <tr style="border: 0">
                            <td class="text-left">
                                No. Hp
                            </td>
                            <td class="text-left" style="width: 10px !important;">
                                :
                            </td>
                            <td class="text-left">
                                {{$data->user->klinik->no_hp}}
                            </td>

                        </tr>
                        <tr style="border: 0">
                            <td class="text-left">
                                Alamat
                            </td>
                            <td class="text-left" style="width: 10px !important; ">
                                :
                            </td>
                            <td class="text-left">
                                {{$data->user->klinik->alamat}}

                            </td>

                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>

    <br>

    <table style="margin-bottom: 10px">
        <thead>
        <tr>
            <th style="width: 10px" class="text-center">#</th>
            <th class="text-center">Nama Barang</th>
            <th class="text-center">Jumlah diminta</th>
            <th class="text-center">Jumlah disetujui</th>
            <th class="text-center">Status</th>
            {{-- <th class="text-center">Total Harga</th> --}}
        </tr>

        </thead>
        <tbody>
        @forelse($data->cart as $key => $d)
            <tr>
                <td>
                    {{$key + 1}}
                </td>
                <td>
                    {{$d->barang->nama_barang}}
                </td>
                <td>
                    {{$d->qty}}
                </td>
                <td>
                    {{$d->qty_disetujui}}
                </td>
                <td>
                    {{$d->status == 1 ? 'Diterima' : $d->status == 2 ? 'Ditolak' : 'menunggu'}}
                </td>
            </tr>
        @empty
        @endforelse
        </tbody>
    </table>


    <br>
    <div style="right:10px;width: 300px;display: inline-block;margin-top:70px">
        <p class="text-center mb-5">Pimpinan</p>
        <p class="text-center">( ........................... )</p>
    </div>

    <div style="left:10px;width: 300px; margin-left : 100px;display: inline-block">
        <p class="text-center mb-5">Admin</p>
        <p class="text-center">( ........................... )</p>
    </div>


    <footer class="footer">
        @php $date = new DateTime("now", new DateTimeZone('Asia/Bangkok') ); @endphp
        <p class="text-right small mb-0 mt-0 pt-0 pb-0"> di cetak oleh :
            {{-- {{ auth()->user()->username }} --}}
        </p>
        <p class="text-right small mb-0 mt-0 pt-0 pb-0"> tgl: {{ $date->format('d F Y, H:i:s') }} </p>
    </footer>

</div>


<!-- JS -->
<script src="js/app.js"></script>
<script src="js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
