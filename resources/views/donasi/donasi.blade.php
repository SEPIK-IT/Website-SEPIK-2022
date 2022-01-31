<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="{{ asset('css/donasi.css') }}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<title>SEPIK 2022 - Donasi</title>

<!-- icon bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<body>
    @extends('layouts.sidebar')
    <button id="tooglebar" onclick="openNav()" style="background-color: transparent; z-index: 0; position: absolute; margin-left: 10%;"><i class="fas fa-bars fa-2x"></i></button>
    <div class="container">
        <!-- heading / judul -->
        <div class="mt-4 p-5 rounded bold text-center">
            <h1 class="my-4">PENGGALANGAN DANA SEPIK 2022</h1>
			<img src="/img/semanggi.png" alt="semanggi" width='50px'>
        </div>

        <!-- Data Pendonasi -->

        <div class="row justify-content-center px-4">
            <div class="col-sm-12 col-md-8 col-xl-6 ">
                <form action="/donasi/donasi" method="POST" enctype="multipart/form-data">
					@csrf

                    <!-- nama -->
                    <div class="mb-5">
                        <label for="nama" class="form-label">
                            <h4>NAMA</h4>
                        </label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama" name="nama" value="{{ old('nama') }}" required>
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- nominal -->
                    <div class="mb-5">
                        <label for="nominal" class="form-label">
                            <h4>NOMINAL</h4>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text rp text-white">Rp. </span>
                            <input type="number" class="form-control @error('nominal') is-invalid @enderror" id="nominal" placeholder="Nominal" name="nominal" value="{{ old('nominal') }}" required>
                            @error('nominal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

					<!-- kategori -->
                    <div class="mb-5">
                        <label for="kategori" class="form-label">
                            <h4>KATEGORI</h4>
                        </label>
                        <select class="form-select" id="kategori" name='kategori' value="{{ old('kategori') }}">
                            <option value="mahasiswa"> Mahasiswa</option>
                            <option value="umum"> Umum</option>
                        </select>
                    </div>

                    <!-- univ -->
                    <div class="mb-5 sumber">
                        <label for="sumber" class="form-label">
                            <h4>ASAL UNIVERSITAS</h4>
                        </label>
                        <select class="form-select" id="sumber" name="sumber" value="{{ old('sumber') }}">
                            <option value="ukp" {{ old('sumber') == 'ukp' ? 'selected' : '' }}> Universitas Kristen Petra</option>
                            <option value="uc" {{ old('sumber') == 'uc' ? 'selected' : '' }}> Universitas Ciputra</option>
                            <option value="wm" {{ old('sumber') == 'wm' ? 'selected' : '' }}> Universitas Katolik Widya Mandala</option>
                            <option value="ubaya" {{ old('sumber') == 'ubaya' ? 'selected' : '' }}> Universitas Surabaya</option>
                            <option value="umum" style="display: none" {{ old('sumber') == 'umum' ? 'selected' : '' }}> Umum</option>
                        </select>
                    </div>

					<div class="mb-5 sumber">
                        <label for="nrp" class="form-label">
                            <h4>NRP</h4>
                        </label>
                        <input type="text" class="form-control @error('nrp') is-invalid @enderror" id="nrp" placeholder="NRP" name="nrp" value="{{ old('nrp') }}" required>
                        @error('nrp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- keterangan transfer -->
                    <div class="mb-5">
                        <h4>KETENTUAN TRANSFER</h4>
                        <div class="count-down-box donasi-box p-4">
                            <h5>Transfer ke nomor rekering BCA</h5>

                            <div class="input-group mb-3 ">
                                <input type="text" class="form-control" id="norek" value="0101920231" readonly>
                                <button class="btn btn-secondary" id="btn-copy" type="button" data-clipboard-target="#norek">
                                    <i class="bi bi-clipboard"></i> 
                                </button>
                                <button class="btn btn-dark myImg" src="/img/qr.jpg" type="button">
                                    <i class="bi bi-qr-code"></i>
                                </button>
                            </div>

                            <h5>A.N Michael Angelo </h5>
                            <br>
                            <h5>Sertakan berita acara: </h5>
                            <h5>Nama (umum)</h5>
                            <h5>Nama nrp (mahasiswa)</h5>
                            <br>
                            <h5>
                                Kode unik transfer: <br>
                                <table class="table table-hover table-secondary mt-2">
                                    <tr>
                                        <td>MASHUP</td>
                                        <td>1</td>
                                    </tr>
                                    <tr>
                                        <td>DESAIN</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td>VIDEO</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>PHOTO</td>
                                        <td>6</td>
                                    </tr>
                                    <tr>
                                        <td>Zoopik</td>
                                        <td>7</td>
                                    </tr>
                                    <tr>
                                        <td>Pengmas</td>
                                        <td>8</td>
                                    </tr>
                                    <tr>
                                        <td>Fesbud dan closing ceremony</td>
                                        <td>9</td>
                                    </tr>
                                    <tr>
                                        <td>Pure donasi</td>
                                        <td>2</td>
                                    </tr>
                                </table>                                 
                                 
                            </h5>
                        </div>
                    </div>

                    <!-- bukti -->
                    <div class="mb-5">

                        <label for="bukti" class="form-label ">
                            <h4>UPLOAD BUKTI TRANSFER</h4>
                        </label>

                        <!-- img container -->
                        <div class="col-sm-12 mb-3">
                            <img class="img-fluid imgBukti myImg" id="myImg" src="">
                        </div>

                        <input class="form-control @error('bukti') is-invalid @enderror" type="file" id="bukti" onchange="readURL(this)" name='bukti' required>
                        @error('bukti')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- pesan -->
                    <div class="mb-5">
                        <label for="pesan" class="form-label">
                            <h4>KESAN PESAN (optional)</h4>
                        </label>
                        <textarea class="form-control" id="pesan" rows="3"
                            placeholder="Tulis pesanmu" name="pesan" value="{{ old('pesan') }}"></textarea>
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
    <!-- jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.8/dist/clipboard.min.js"></script>

<script src="/js/donasi.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
          var screenWidth = window.screen.width;

          if (screenWidth<=400){
              $('#haha2').show();
              $('#haha').hide();






          }
          else{
              $('#haha').show();
              $('#haha2').hide();





          }



});



          var s = skrollr.init();
  // $("body").fadeOut(1000, function(){redirectPage('home.html')});
// 		$( "#banner" ).click(function() {
//   $("body").fadeOut(1000);
//   location.replace("https://www.w3schools.com");
// });

// $('.container-fluid').attr('data-1000','transform:translateX(-900%)');
// alert($('.container-fluid').attr('data-1000'));
$(document).on('click', "#banner", function(event) {
event.preventDefault();
linkLocation = 'www.youtube.com';
$("body").fadeOut(1000, function(){location.replace("login.html")});
});


function openNav() {
document.getElementById("mySidebar").style.width = "250px";
document.getElementById("main").style.marginLeft = "250px";
}

/* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
function closeNav() {
document.getElementById("mySidebar").style.width = "0";
document.getElementById("main").style.marginLeft = "0";
}

</script>
</body>


