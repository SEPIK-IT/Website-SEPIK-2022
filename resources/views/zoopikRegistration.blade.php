<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/contestRegist.css">
    <title>Daftar Zoopik - Surabaya Epik 2022</title>
</head>

<body class="bg">
    <button id="tooglebar" onclick="openNav()"
            style="background-color: transparent; z-index: 0; position: absolute; margin-left: 90%; margin-top: 2.5%;"><i
            class="fas fa-bars fa-2x"></i></button>
    @extends('layouts.sidebar')
    <div class="container-fluid">
        <div class="row justify-content-center">
            
            @if ($userRegistered === false)
            <div class="col-2 p-0">
                <img class="img-blok" src="{{ asset('img/auth/batik_cokelat.png') }}" alt="batik_cokelat.png">
            </div>

            <div class="col align-self-center p-4">
                <div class="h1">Daftar Zoopik</div>
    
                <div class="">
                    <div class="text-body">
                        <form method="POST" action="/zoopikRegistration" enctype="multipart/form-data">
                            @csrf
    
                            <div class="form-group mt-3">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nama Lengkap</label>
    
                                <div class="col">
                                    <input id="name" type="text" class="form-control"
                                        name="name" value="{{ $username }}" readonly>
                                </div>
                            </div>
    
                            <div class="form-group mt-3">
                                <label for="nrp" class="col-md-4 col-form-label text-md-right">NRP (Nomor Induk Pokok) / NIM</label>
    
                                <div class="col">
                                    <input id="nrp" type="text" class="form-control @error('nrp') is-invalid @enderror"
                                        name="nrp" value="{{ old('nrp') }}" required>
    
                                    @error('nrp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group mt-3">
                                <label for="asalUniv" class="col-md-4 col-form-label text-md-right">Asal Universitas</label>
    
                                <div class="col">
                                    <select name="asalUniv" id="asalUniv" class="form-control @error('asalUniv') is-invalid @enderror" 
                                        value="{{ old('asalUniv') }}" required
                                    >
                                        <option value="" selected disabled hidden>Pilih universitas...</option>
                                        <option value="Universitas Kristen Petra">Universitas Kristen Petra</option>
                                        <option value="Universitas Ciputra">Universitas Ciputra</option>
                                        <option value="Universitas Surabaya">Universitas Surabaya</option>
                                        <option value="Universitas Widya Mandala">Universitas Widya Mandala</option>
                                    </select>
    
                                    @error('asalUniv')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group mt-3">
                                <label for="ktm" class="col-md-4 col-form-label text-md-right">Kartu Tanda Mahasiswa</label>
    
                                <div class="col">
                                    <input id="ktm" type="file" class="form-control @error('ktm') is-invalid @enderror"
                                        name="ktm" required>
    
                                    @error('ktm')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group mt-3">
                                <label for="foto" class="col-md-4 col-form-label text-md-right">Foto 3 x 4</label>
    
                                <div class="col">
                                    <input id="foto" type="file" class="form-control @error('foto') is-invalid @enderror"
                                        name="foto" required>
    
                                    @error('foto')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="my-5">
                                <p>KETENTUAN TRANSFER</p>
                                <div style="background-color: rgba(68, 57, 38, 255);
                                color: rgba(247, 243, 240, 255);" class="py-5">
                                    <div class="ms-4 me-4">
                                        <h5>Transfer ke nomor rekening BCA</h5>
                                        <div class="input-group mb-3 ">
                                            <input type="text" class="form-control" id="norek" value="0101920231" readonly>
                                            <button class="btn btn-secondary" id="btn-copy" type="button"
                                                    data-clipboard-target="#norek">
                                                <i class="bi bi-clipboard"></i>
                                            </button>
                                            <button class="btn btn-dark myImg" src="{{ asset('img/qr.jpg') }}" type="button">
                                                <i class="bi bi-qr-code"></i>
                                            </button>
                                        </div>
                
                                        <div class="form-text fw-bold">*Minimal pembayaran adalah Rp 15.007</div>
                                        <div class="form-text fw-bold">*Penulisan nominal tidak perlu titik atau koma</div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <label for="nominal" class="col-md-4 col-form-label text-md-right">Nominal Pembayaran</label>
    
                                <div class="col">
                                    <input id="nominal" type="number" class="form-control @error('nominal') is-invalid @enderror"
                                        name="nominal" required>

                                    @error('nominal')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <label for="buktiTransfer" class="col-md-4 col-form-label text-md-right">Bukti Transfer</label>
    
                                <div class="col">
                                    <input id="buktiTransfer" type="file" class="form-control @error('buktiTransfer') is-invalid @enderror"
                                        name="buktiTransfer" required>

                                        <div class="form-text fw-bold">*Berita acara: nama_nrp</div>
                                        <div class="form-text fw-bold">*Angka terakhir pada nominal transfer diberi angka 7 </div>
    
                                    @error('buktiTransfer')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group">
                                <div class="col">
                                    <button type="submit" class="btn btn-submit my-4">
                                        Daftar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
    
                </div>
            </div>
            @else
                <div class="col-2 p-0" style="height: 100vh">
                    <img class="img-blok" src="{{ asset('img/auth/batik_cokelat.png') }}" alt="batik_cokelat.png">
                </div>

                <div class="col align-self-center p-4">
                    <h1>Anda telah mendaftar zoopik!</h1>
                    <h6 class="fw-bold">Anda hanya dapat melakukan 1x pendaftaran untuk zoopik</h6>
                </div>
            @endif
    
            <div class="col-3 align-self-end text-center pb-5 mb-5">
                <img class="img-mascot" src="{{ asset('img/auth/epik.png') }}" alt="epik.png">
            </div>
    
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.8/dist/clipboard.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            
            if ($("#btn-copy").length > 0) {
                copyButton();
            }
            modalImage();
            var screenWidth = window.screen.width;
    
            if (screenWidth <= 400) {
                $('#haha2').show();
                $('#haha').hide();
    
    
            } else {
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
        $(document).on('click', "#banner", function (event) {
            event.preventDefault();
            linkLocation = 'www.youtube.com';
            $("body").fadeOut(1000, function () {
                location.replace("login.html")
            });
        });
        function modalImage() {
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var modalImg = document.getElementById("img01");

            $(".myImg").click(function () {
                modal.style.display = "block";
                modalImg.src = $(this).attr('src');
            });

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on <span> (x), close the modal
            span.onclick = function () {
                modal.style.display = "none";
            }
        }

        $(".myImg").click(function () {
            modal.style.display = "block";
            modalImg.src = $(this).attr('src');
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
        
        function copyButton() {
                var clipboard = new ClipboardJS('#btn-copy');
            }
        
    </script>
    @livewireScripts
    </body>
</html>