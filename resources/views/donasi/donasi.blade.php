@extends('layouts.app')

@section('content')

<!-- css for donasi -->
<link rel="stylesheet" href="/css/donasi.css">

<body>
    <div class="container">
        <!-- heading / judul -->
        <div class="mt-4 p-5 rounded bold text-center">
            <h1 class="my-4">DONASI SEPIK 2022</h1>
			<img src="/img/semanggi.png" alt="semanggi" width='50px'>
        </div>

        <!-- Data Pendonasi -->

        <div class="row justify-content-center px-4">
            <div class="col-sm-12 col-md-8 col-xl-6 ">
                <!-- <form action="" method="POST"> -->

                    <!-- nama -->
                    <div class="mb-5">
                        <label for="nama" class="form-label">
                            <h4>NAMA</h4>
                        </label>
                        <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama">
                    </div>

                    <!-- nominal -->
                    <div class="mb-5">
                        <label for="nominal" class="form-label">
                            <h4>NOMINAL</h4>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text rp text-white">Rp. </span>
                            <input type="number" class="form-control" id="nominal" placeholder="Nominal" name="nominal">
                        </div>
                    </div>

					<!-- kategori -->
                    <div class="mb-5">
                        <label for="kategori" class="form-label">
                            <h4>KATEGORI</h4>
                        </label>
                        <select class="form-select" id="kategori">
                            <option value="mahasiswa"> Mahasiswa</option>
                            <option value="umum"> Umum</option>
                        </select>
                    </div>

                    <!-- univ -->
                    <div class="mb-5 sumber">
                        <label for="sumber" class="form-label">
                            <h4>ASAL UNIVERSITAS</h4>
                        </label>
                        <select class="form-select" id="sumber" name="sumber">
                            <option value="ukp"> Universitas Kristen Petra</option>
                            <option value="uc"> Universitas Ciputra</option>
                            <option value="wm"> Universitas Katolik Widya Mandala</option>
                            <option value="ubaya"> Universitas Surabaya</option>
                            <option value="umum" style="display: none"> Umum</option>
                        </select>
                    </div>


                    <!-- bukti -->
                    <div class="mb-5">

                        <label for="bukti" class="form-label ">
                            <h4>UPLOAD BUKTI TRANSFER</h4>
                        </label>

                        <!-- img container -->
                        <div class="col-sm-12 mb-3">
                            <img class="img-fluid imgBukti" id="myImg" src="http://placehold.it/180">
                        </div>

                        <input class="form-control" type="file" id="bukti" onchange="readURL(this)">
                    </div>

                    <!-- pesan -->
                    <div class="mb-5">
                        <label for="pesan" class="form-label">
                            <h4>KESAN PESAN</h4>
                        </label>
                        <textarea class="form-control" id="pesan" rows="3"
                            placeholder="Tulis pesanmu" name="pesan"></textarea>
                    </div>

                    <!-- submit -->
                    <div class="mb-5">
                        <div class="d-grid gap-2">
                            <button class="btn btn-sepik" type="submit" name="submit">SUBMIT</button>
                        </div>
                    </div>
                </form>
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
