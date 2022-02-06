@props(['title' => 'Surabaya Epik 2022', 'scripts' => ''])
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="/css/contestRegist.css">
    <title>{{$title}}</title>
    @livewireStyles
</head>

<body class="bg">
<button id="tooglebar" onclick="openNav()"
        style="background-color: transparent; z-index: 0; position: absolute; margin-left: 90%; margin-top: 2.5%;"><i
        class="fas fa-bars fa-2x"></i></button>
@extends('layouts.sidebar')
<div class="container-fluid">
    <div class="row">
        <div class="col-2 p-0">
            <img class="img-blok" src="{{ asset('img/auth/batik_cokelat.png') }}" alt="batik_cokelat.png">
        </div>

        <div class="col p-4">
            {{$slot}}
        </div>

        <div class="col-3 align-self-end text-center pb-5 mb-5">
            <img class="img-mascot" src="{{ asset('img/auth/epik.png') }}" alt="epik.png">
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $(document).ready(function () {
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
@livewireScripts
{{$scripts}}
</body>
</html>
