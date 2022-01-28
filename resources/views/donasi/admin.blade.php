@extends('layouts.app')

@section('content')

<!-- css for donasi -->
<link rel="stylesheet" href="/css/donasi.css">

<!-- icon bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

<!-- data table -->
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css"> origin -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">

<body>
    <div class="container">
        <!-- heading / judul -->
        <div class="mt-4 p-5 rounded bold text-center">
            <h1 class="my-4">ADMIN DONASI SEPIK 2022</h1>
            <img src="/img/semanggi.png" alt="semanggi" width='50px'>
        </div>

        <!-- Data table Pendonasi -->

        <div class="row justify-content-center px-4">
            <div class="col-sm-12 col-md-10 col-xl-10 ">
                <table id="table_donasi" class="table table-bordered table-striped table-hover table-light">
                    <thead>
                        <tr>
                            <th id="nama">      Nama</th>
                            <th id="nrp">       NRP</th>
                            <th id="kategori">  Kategori</th>
                            <th id="nominal">  Nominal</th>
                            <th id="submit-at">  Submited at</th>
                            <th id="bukti">     Bukti</th>
                            <th id="konfirmasi">Konfirmasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($donasis as $donasi)
                            <tr>
                                <td>{{ $donasi->nama }}</td>
                                <td>{{ $donasi->nrp }}</td>

                                @if ($donasi->sumber === "ukp")
                                    <td>Universitas Kristen Petra</td>
                                @elseif ($donasi->sumber === "uc")
                                    <td>Universitas Ciputra</td>
                                @elseif ($donasi->sumber === "wm")
                                    <td>Universitas Katolik Widya Mandala</td>
                                @elseif ($donasi->sumber === "ubaya")
                                    <td>Universitas Surabaya</td>
                                @elseif ($donasi->sumber === "umum")
                                    <td>Umum</td>
                                @endif

                                <td> @currency($donasi->nominal) </td>
                                <td>{{ $donasi->created_at }}</td>

                                <td>
                                    <!-- <img class="img-fluid imgBukti myImg" width="100px" id="myImg" src="{{ asset('storage/' . $donasi->bukti) }}"> -->
                                    <button type="button" class="btn btn-sepik myImg" src="{{ asset('storage/' . $donasi->bukti) }}">Show Bukti</button>
                                </td>

                                <td>
                                    @if ($donasi->konfirmasi === 2)
                                        <i class="bi bi-exclamation-circle-fill text-warning" data-bs-toggle="tooltip" data-bs-placement="right" title="Belum dikonfirmasi"></i>
                                    @elseif ($donasi->konfirmasi === 1)
                                        <i class="bi bi-check-circle-fill text-success" data-bs-toggle="tooltip" data-bs-placement="right" title="Verified"></i>
                                    @elseif ($donasi->konfirmasi === 0)
                                        <i class="bi bi-x-circle-fill text-danger" data-bs-toggle="tooltip" data-bs-placement="right" title="Data salah"></i>
                                    @endif
                                    <div style="display: none">{{ $donasi->konfirmasi }}</div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- The Close Button -->
        <span class="close">&times;</span>

        <!-- Modal Content (The Image) -->
        <img class="modal-content" id="img01">

    </div>

</body>

<!-- jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- data table -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>

<!-- data table boostrap -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

<!-- js bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="/js/donasi.js"></script>

@endsection
