<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewaport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/Pameranfoto.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/sayembara-style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>SEPIK 2022 - Pameran Ilustrasi</title>


    <style>
        .swal2-styled.swal2-confirm{
            background: initial;
            background-color: #0E001A;
            color: #fff;
        }
        .swal2-popup{
            width: 55em;
            background-color: #ad966d;
        }

        .swal2-title{
            color: #000;
        }
        .swal2-content{
            color: #000;
        }
        .swal2-icon.swal2-question{
            border-color: #000;
            color: #000;
        }
    </style>
    <script>
        $(document).ready(function(){
            @foreach ($data as $atrb)
                $('#' + <?php echo $atrb['id'];?>).on('click', function () {
                    Swal.fire({
                        title: '',
                        html:"<a href='<?php echo Storage::url($atrb['file_path']);?>'><img src='<?php echo Storage::url($atrb['file_path']);?>' alt='' style='max-height:400px; max-width:400px'></a> <br>click to enlarge<br><br> <h2 style='color:#000'>Dibuat oleh <?php echo $atrb['name'];?></h2> <br> <div class='text-left'><?php echo $atrb['caption'];?></div>",
                        imageAlt: 'Picture',
                        icon: 'info',
                        confirmButtonText: 'Close'
                    })
                });
            @endforeach
        });
    </script>
</head>
<body>
    @extends('layouts.sidebar')
    <button id="tooglebar" onclick="openNav()" style="background-color: transparent; z-index: 0; position: absolute; margin-left: 5%;"><i class="fas fa-bars fa-2x"></i></button>
    

    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2>PAMERAN ILUSTRASI</h2>
            </div>
        </div>
        @foreach ($data as $atrb)
            <div class="row">
                <div class="col text-center">
                    <a href="#" id=<?php echo $atrb['id'];?>>
                        <img src="<?php echo Storage::url($atrb['file_path']);?>" alt="" style="height:400px;" loading="lazy">
                    </a>
                    <br>
                    <span>CLICK FOR MORE INFO</span>
                </div>								
            </div>
        @endforeach
    </div>


<script type="text/javascript">
    $(document).on('click', "#banner", function(event) {
    event.preventDefault();
    linkLocation = 'www.youtube.com';
    $("body").fadeOut(1000, function(){location.replace("login.html")});
    });


    function openNav() {
    document.getElementById("mySidebar").style.width = "300px";
    document.getElementById("main").style.marginLeft = "300px";
    }

    /* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
    function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
    }

</script>   
</body>
</html>