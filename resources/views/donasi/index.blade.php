@extends('layouts.app')

@section('content')

<!-- css for donasi -->
<link rel="stylesheet" href="/css/donasi.css">

<body>
    <div class="container bg">

        <!-- jumbotron -->
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light my-3">DONASI</h1>
                    <img src="/img/semanggi.png" alt="semanggi" width='50px'>

                    <p class="lead text-muted mt-5">Penggalangan dana SEPIK 2022 ditujukan kepada budayawan dan
                        komunitas kebudayaan Surabaya yang terlibat kerja
                        sama dengan Surabaya Epik (SEPIK) 2022. Wujud donasi disalurkan dalam bentuk barang yang sesuai
                        dengan kebutuhan
                        budayawan dan komunitas kebudayaan Surabaya yang terlibat kerja sama dengan pihak Surabaya Epik
                        (SEPIK) 2022.</p>
                    <p>
                        <!-- donate  -->
                        <a href="/donasi/donasi" class="btn btn-sepik my-2">DONASI SEKARANG</a>
                        <a href="#album" class="btn btn-secondary my-2">Baca Pesan</a>
                    </p>
                </div>
            </div>
        </section>

        <!-- count down -->
        <div class="row justify-content-center px-4">
            <div class="col-sm-12 col-md-8 col-xl-6 ">

                <h3 class="text-center" id="ket-donasi"></h3>

                <div class="d-flex flex-nowarp my-4">
                    <!-- days -->
                    <div class="count-down-box">
                        <p class="count-down-time" id="hari">0</p>
                        <h4 class="text-center">DINA</h4>
                    </div>

                    <!-- hours -->
                    <div class="count-down-box">
                        <p class="count-down-time" id="jam">0</p>
                        <h4 class="text-center">JAM</h4>
                    </div>

                    <!-- minute -->
                    <div class="count-down-box">
                        <p class="count-down-time" id="menit">0</p>
                        <h4 class="text-center">MENIT</h4>
                    </div>

                    <!-- second -->
                    <div class="count-down-box">
                        <p class="count-down-time" id="detik">0</p>
                        <h4 class="text-center">DETIK</h4>
                    </div>
                </div>

                <div class="count-down-box donasi-box text-center">
                    <h2>Konfirmasi Donasi Terkumpul</h2>
                    <!-- dari data base -->
                    <h2>@currency($total) </h2>
                </div>

            </div>
        </div>

        <!-- pesan pesan -->
        <hr class="my-5" style="height:5px">
        <h2 class="text-center my-4">PESAN-PESAN PENDONASI</h2>
        <div class="album py-5" id="album">
            <div class="container">

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <!-- 1 col 1 pesan di for each -->
                    @foreach($pesans as $pesan)
                        <div class="col">
                            <div class="card shadow-sm">

                                <div class="card-body">
                                    <!-- isi pesan -->
                                    <h4 class="card-text">
                                        {{ $pesan->pesan }}
                                    </h4>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <!-- nama pendonasi -->
                                        <h5 class="text-muted"> {{ $pesan->nama }} </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>

</body>


<!-- jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="/js/donasi.js"></script>

@endsection
