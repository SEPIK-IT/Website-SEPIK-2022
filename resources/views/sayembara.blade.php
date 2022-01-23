<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/sayembara-style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <title>SEPIK 2022 - Sayembara</title>
</head>
<body class="m-0 p-0">
    @extends('layouts.sidebar')
    <button id="tooglebar" onclick="openNav()" style="background-color: transparent; z-index: 0; position: absolute; margin-left: 10%;"><i class="fas fa-bars fa-2x"></i></button>
    <img class="background-image" src="{{ asset('img/bg.png') }}">
    <div class="container">
        <div class="title mtlarge">
            <div class="title-header mx-xxl-5 px-xxl-5">
                <div class="title-header mx-xxl-5 px-xxl-5">
                    <div class="title-header mx-xxl-5 px-xxl-5">
                        <div class="title-header mx-xxl-5 px-xxl-5 mt-5 pt-5">
                            <h1 class="display-2 fw-bolder text-center">Sayembara Surabaya Epik</h1> 
                        </div>
                    </div>
                </div> 
            </div>
            <div class="title-descriptions mx-xxl-5 px-xxl-5">
                <div class="title-descriptions mx-xxl-5 px-xxl-5">
                    <div class="title-descriptions mx-xxl-5 px-xxl-5 mt-4">
                        <p class="fw-bold text-center">Tema dari Sayembara Epik 2022 adalah Nuwuhake Kreativitas saka Karya Epik. Akan terdapat 4 sayembara (lomba) guna menyemarakan SEPIK tahun ini.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5 text-center">
            <img src="{{ asset('img/semanggi.png') }}" style="width: 50px; height: 50px;">
        </div>
        <!--HUman Interest-->
        <div class="mx-xxl-5 px-xxl-5 mt-5 pt-5">
            <div class="mx-xxl-5 px-xxl-5 mt-5 pt-5">
                <div class="mx-xxl-5 px-xxl-5">
                    <table class="mx-auto">
                        <tr>
                            <td rowspan="5">
                                <img src="{{ asset('img/kamera.png') }}" class="img-fluid mx-auto d-block">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h2>HUMAN INTEREST & STREET PHOTOGRAPHY</h2>
                                <hr class="sayembaradivider">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="textjustify">Sayembara Human Interest & Street Photography ini akan dibuka untuk umum, baik untuk warga Surabaya maupun dari luar kota Surabaya. Sayembara ini dapat diikuti secara individu.</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {{-- <div class="capsulebutton" style="cursor: pointer;" onclick="location.href='#'"><span class="position-relative text-end">test</span><div class="innerbutton text-center">test</div></div> --}}
                                <div style="cursor: pointer;" class="capsulebutton d-flex align-items-center justify-content-start"><div class="innerbutton d-flex align-items-center justify-content-center text-white">Rp 25.000,-/individu</div> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download text-white ms-2" viewBox="0 0 16 16">
                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                  </svg><div class="mx-2 text-white">SOP SAYEMBARA</div></div>
                            </td>
                        </tr>
                        <tr>
                            <td class="pt-2">
                                <div class="pendaftaranbutton" style="cursor: pointer;" onclick="location.href='#'"><p class="d-flex align-items-center justify-content-center" style="line-height: 50px; color: white;">PENDAFTARAN</p></div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <!---->
        <div class="mx-xxl-5 px-xxl-5 mt-5 pt-5">
            <div class="mx-xxl-5 px-xxl-5 mt-5 pt-5">
                <div class="mx-xxl-5 px-xxl-5">
                    <table class="mx-auto">
                        <tr>
                            <td rowspan="5">
                                <img src="{{ asset('img/kameravideo.png') }}" class="img-fluid mx-auto d-block">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h2 class="">SHORT CINEMATIC VIDEO COMPETITION</h2>
                                <hr class="sayembaradivider">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="textjustify">Sayembara Cinematic Video ini dibuka untuk umum, baik untuk warga Surabaya maupun dari luar Kota Surabaya. Sayembara ini bersifat kelompok (tim) yang beranggotakan maksimal 3 orang per tim dan dapat diikuti secara individu.</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="cursor: pointer;" class="capsulebutton d-flex align-items-center justify-content-start"><div class="innerbutton d-flex align-items-center justify-content-center text-white">Rp 30.000,-/tim</div> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download text-white ms-2" viewBox="0 0 16 16">
                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                  </svg><div class="mx-2 text-white">SOP SAYEMBARA</div></div>
                            </td>
                        </tr>
                        <tr>
                            <td class="pt-2">
                                <div class="pendaftaranbutton" style="cursor: pointer;" onclick="location.href='#'"><p class="d-flex align-items-center justify-content-center" style="line-height: 50px; color: white;">PENDAFTARAN</p></div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <!---->
        <div class="mx-xxl-5 px-xxl-5 mt-5 pt-5">
            <div class="mx-xxl-5 px-xxl-5 mt-5 pt-5">
                <div class="mx-xxl-5 px-xxl-5">
                    <table class="mx-auto">
                        <tr>
                            <td rowspan="5">
                                <img src="{{ asset('img/mashup.png') }}" class="img-fluid mx-auto d-block">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h2>MASH-UP LAGU</h2>
                                <hr class="sayembaradivider">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="textjustify">Sayembara Mash-up lagu akan dibuka untuk umum, baik untuk warga Surabaya maupun dari luar Kota Surabaya. Lomba ini bersifat tim yang beranggotakan maksimal 3 anggota, yang sudah termasuk pemusik dan vokalis</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="cursor: pointer;" class="capsulebutton d-flex align-items-center justify-content-start"><div class="innerbutton d-flex align-items-center justify-content-center text-white">Rp 30.000,-/tim</div> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download text-white ms-2" viewBox="0 0 16 16">
                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                  </svg><div class="mx-2 text-white">SOP SAYEMBARA</div></div>
                            </td>
                        </tr>
                        <tr>
                            <td class="pt-2">
                                <div class="pendaftaranbutton" style="cursor: pointer;" onclick="location.href='#'"><p class="d-flex align-items-center justify-content-center" style="line-height: 50px; color: white;">PENDAFTARAN</p></div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <!---->
        <div class="mx-xxl-5 px-xxl-5 my-5 py-5">
            <div class="mx-xxl-5 px-xxl-5 my-5 py-5">
                <div class="mx-xxl-5 px-xxl-5">
                    <table class="mx-auto">
                        <tr>
                            <td rowspan="5">
                                <img src="{{ asset('img/cat.png') }}" class="img-fluid mx-auto d-block">
                            </td>
                        </tr>
                        <tr class="ps-5">
                            <td>
                                <h2>DESAIN ILUSTRASI</h2>
                                <hr class="sayembaradivider"">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Sayembara Desain Ilustrasi dibuka untuk umum, baik untuk warga Kota Surabaya maupun dari luar Kota Surabaya. Dengan tema yang diangkat yakni seputar Kebudayaan Surabaya, sayembara ini dapat diikuti secara individu.</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="cursor: pointer;" class="capsulebutton d-flex align-items-center justify-content-start"><div class="innerbutton d-flex align-items-center justify-content-center text-white">Rp 25.000,-/individu</div> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download text-white ms-2" viewBox="0 0 16 16">
                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                  </svg><div class="mx-2 text-white">SOP SAYEMBARA</div></div>
                            </td>
                        </tr>
                        <tr>
                            <td class="pt-2">
                                <div class="pendaftaranbutton" style="cursor: pointer;" onclick="location.href='#'"><p class="d-flex align-items-center justify-content-center" style="line-height: 50px; color: white;">PENDAFTARAN</p></div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
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
</html>