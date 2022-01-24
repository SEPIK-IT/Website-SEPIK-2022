@extends('layouts.app')

@section('content')

<!-- css for donasi -->
<link rel="stylesheet" href="/css/donasi.css">

<body>
	<div class="container bg">
        
        <!-- heading / judul -->
		<div class="mt-4 p-5 rounded bold text-center">
            <!-- <div class="row justify-content-center">
                <div class="col-xl-3 ">
                    <img src="/img/sepik2022.png" alt="logo sepik" class="img-fluid" id="logo-sepik">
                </div>
            </div> -->

            <h1 class="my-3">DONASI</h1> 
		    <img src="/img/semanggi.png" alt="semanggi" width='50px'>
		</div>
        
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
                    <h2>Rp. 1.000.000</h2>      
                </div>

                <h4 class="mt-5">Penggalangan dana SEPIK 2022 ditujukan kepada budayawan dan komunitas kebudayaan Surabaya yang terlibat kerja 
                sama dengan Surabaya Epik (SEPIK) 2022. Wujud donasi disalurkan dalam bentuk barang yang sesuai dengan kebutuhan 
                budayawan dan komunitas kebudayaan Surabaya yang terlibat kerja sama dengan pihak Surabaya Epik (SEPIK) 2022. </h4> 

                <!-- donate  -->
                <a href="/donasi/donasi" class="btn btn-sepik mt-3">DONASI SEKARANG</a>
            </div>
        </div>
    </div>

</body>
</html>

<!-- jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="/js/donasi.js"></script>

@endsection

<!-- 
    mikir umum sana mhs
    upload gambar kemana
    cara upload gambar
    namaa page
 -->