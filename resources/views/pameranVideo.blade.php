<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewaport" content="width=device-width, initial-scale=1.0">
    <!-- Custom CSS -->
    <link href="{{ asset('css/pameranVideo.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/sayembara-style.css') }}" rel="stylesheet">

    <!-- JS -->
    <!-- <script src="{{ asset('js/pameranVideo.js') }}"></script> -->

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
    <title>SEPIK</title>
</head>
<body>
    
    @extends('layouts.sidebar')
    <button id="tooglebar" onclick="openNav()" style="background-color: transparent; z-index: 0; position: absolute; margin-left: 5%;"><i class="fas fa-bars fa-2x"></i></button>
    

    <div class="container" id="output">
        <div class="row">
            <div class="col-12 text-center">
                <h2>PAMERAN VIDEO</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($data as $item)
                <div class="col-12 col-lg-4 mb-2 d-flex justify-content-center align-items-center">
                <div class="card border-0 d-flex justify-content-center align-items-center" style="width:400px; background-color: transparent;">
                    <?php
                        echo $item['link'];
                    ?>
                    <div class="card-body text-center" style="margin-top: -25px;">
                        <h4 class="card-title">Karya Oleh</h4>
                    </div>
                </div>
                </div> 
            @endforeach
        </div>
        
        
    </div>

    <span>
        {{$data->onEachSide(1)->links("pagination::bootstrap-4")}}
    </span>

    <script type="text/javascript">
//         $(document).ready(function () {
//               var screenWidth = window.screen.width;

//               if (screenWidth<=400){
//                   $('#haha2').show();
//                   $('#haha').hide();






//               }
//               else{
//                   $('#haha').show();
//                   $('#haha2').hide();





//               }



// });



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