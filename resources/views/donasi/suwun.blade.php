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
            <div class="row py-lg-5">
                <div class="col-lg-10 col-md-8 mx-auto">
                    <div class="row">
                        <div class="col align-middle">
                            <img class="img-fluid position-relative top-50 end-0 translate-middle-y" src="/img/auth/epik.png" alt="epik">
                        </div>

                        <div class="col">
                            <h1 class="fw-light my-3">MATUR NUWUN</h1>
                            <img class="img-fluid" src="/img/semanggi.png" alt="semanggi" width=50px>

                            <h1 class="my-5">
                                ꦩꦠꦸꦂ ꦤꦸꦮꦸꦤ꧀
                            </h1>
                        </div>

                        <div class="col">
                            <img class="img-fluid position-relative top-50 end-0 translate-middle-y" src="/img/auth/apik.png" alt="apik" >

                        </div>
                    </div>





                    <p class="lead text-muted mt-5">

                    </p>
                    <p>
                        <!-- home  -->
                        <a href="/" class="btn btn-sepik my-2">HOME</a>
                        <a href="/donasi/#album" class="btn btn-secondary my-2">Baca Pesan</a>
                    </p>
                </div>
            </div>
        </section>
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
