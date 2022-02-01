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
            <h1 class="my-4">ADMIN PENGGALANGAN DANA SEPIK 2022</h1>
            <img src="/img/semanggi.png" alt="semanggi" width='50px'>
        </div>

        <!-- Data table Pendonasi -->

        <div class="row justify-content-center px-4">
            <div class="col-sm-12 col-md-11 col-xl-11 table-responsive">
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
                        @foreach($donations as $d)
                            <tr>
                                <td>{{ $d->name }}</td>
                                <td>{{ $d->identification }}</td>

                                @if ($d->source === "ukp")
                                    <td>Universitas Kristen Petra</td>
                                @elseif ($d->source === "uc")
                                    <td>Universitas Ciputra</td>
                                @elseif ($d->source === "wm")
                                    <td>Universitas Katolik Widya Mandala</td>
                                @elseif ($d->source === "ubaya")
                                    <td>Universitas Surabaya</td>
                                @elseif ($d->source === "umum")
                                    <td>Umum</td>
                                @endif

                                <td> @currency($d->nominal) </td>
                                <td>{{ $d->created_at }}</td>

                                <td>
                                    <!-- <img class="img-fluid imgBukti myImg" width="100px" id="myImg" src="{{ asset('storage/' . $d->proof) }}"> -->
                                    <button type="button" class="btn btn-sepik myImg" src="{{ asset('storage/' . $d->proof) }}">Show Bukti</button>
                                </td>

                                <td class="edit" id="{{ $d->donation_id }}">
                                    <button type="button" class="btn btn-lg" data-bs-toggle="popover">
                                    @if ($d->confirmation === 2)
                                        <i class="bi bi-exclamation-circle-fill text-warning"></i>
                                    @elseif ($d->confirmation === 1)
                                        <i class="bi bi-check-circle-fill text-success"></i>
                                    @elseif ($d->confirmation === 0)
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                    </button>
                                    <div class="data" style="display: none">{{ $d->confirmation }}</div>
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

    <!-- toast for notif -->
    <div class="toast" style="position: fixed; bottom: 10px; right: 10px; z-index: 3">
        <div class="toast-header">
            <strong class="me-auto text-info">NOTIFICATION</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body">
            <p>Sukses</p>
        </div>
    </div>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- data table -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>

<!-- data table boostrap -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

<!-- js bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

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


