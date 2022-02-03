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
    <button id="tooglebar" onclick="openNav()" style="background-color: transparent; z-index: 0; position: absolute; margin-left: 10%; margin-top: 5%;"><i class="fas fa-bars fa-2x"></i></button>
    <div class="container bg">

        <!-- jumbotron -->
        <section class="py-5 text-center container">
            <div class="row pt-lg-5 pb-lg-2">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light my-3">PENGGALANGAN DANA</h1>
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
                    @if(Auth::user()->is_admin == 1)
                    <p>
                        <a href="/donasi/admin" class="btn btn-sepik my-2">Admin Panel</a>
                    </p>
                    @endif
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
                    <h2>Konfirmasi Dana Terkumpul</h2>
                    <!-- dari data base -->
                    <h2>@currency($total) </h2>
                </div>

            </div>
        </div>

        <!-- pesan pesan -->
        <hr class="my-5" style="height:5px">
        <h2 class="text-center my-4">PESAN-PESAN</h2>
        <div class="album py-5" id="album">
            <div class="container">

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <!-- 1 col 1 pesan di for each -->
                    @foreach($messages as $m)
                        <div class="col">
                            <div class="card shadow-sm">

                                <div class="card-body">
                                    <!-- isi pesan -->
                                    <h4 class="card-text">
                                        {{ $m->message }}
                                    </h4>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <!-- nama pendonasi -->
                                        <h5 class="text-muted"> {{ $m->name }} </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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


<!-- jquery -->


