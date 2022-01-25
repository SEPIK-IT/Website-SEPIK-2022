<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Surabaya Epik 2022</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="icon" src="{{ asset('img/icon.jpg') }}" type="image/x-icon">
</head>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<style type="text/css">

@font-face {
    font-family: rutaban;
    src: url("../font/rutaban/RUTAN___.TTF");
}

body {
    margin: 0 !important;
    padding: 0 !;
    /* margin: 0;
    padding: 0;
    border: 0;
    outline: 0;
    font-size: 100%;
    vertical-align: baseline;
    background: transparent; */
    font-family: rutaban !important;
}
	*{
		
	}
	.container-fluid{
		position: fixed;
		top: 0;
		/*left: -15px;*/
		/*width: 2900px;*/
		/*display: flex;*/
	}



	#maskot{
		position: fixed;
		left: 50%;
		bottom: 1%;
		transform: translateX(-50%);

	}


	#logo{
		position: fixed;
		left: 20px;
		top: 20px;
		z-index: 2;

	}

	#sepik{
		position: fixed;
		left: 230px;
		top: 135px;
		z-index: 2;

	}

	#signTimeline{
		position: fixed;
		left: 1220px;
		top: 325px;
		/*bottom: 60vh;*/
		z-index: 2;

	}



/*@media only screen and (max-width: 1350px) {
  #signTimeline {
    top: 300px;
  }
  #papan{
  	top: ;

  }
}*/

@media only screen and (min-width:1000px and max-width: 1250px) {
  #signTimeline {
    top: 250px;
    width: 200px !important;
  }
  #papan{
  	top: ;
  	width: 600px !important;
  }
  #maskot{
  	width: 350px !important;
  }
  #signEvent {
    top: 250px !important;
    width: 200px !important;
  }
  #sayem,#socmed,#zoopik, #fesbud,#closing	 {
    top: 250px !important;
    width: 200px !important;
  }
  #moreinfo1{
  	top: 330px !important;
  	left: 3365px !important;
  }
  #moreinfo2{
  	top: 330px !important;
  	left: 4010px !important;
  }
  #moreinfo3{
  	top: 330px !important;
  	left: 5065px !important;
  }
  #moreinfo4{
  	top: 330px !important;
  	left: 5840px !important;
  }
  #moreinfo5{
  	top: 330px !important;
  	left: 6690px !important;
  }
  #jalesveva{
  	top: 	60px !important;
  	width: 	300px !important;
  }
  #tugu{
  	width	: 180px !important;

  }
  #monkasel{
  	width: 	500px !important;
  	top: 	300px !important;

  }
  #surabaya{
  	width: 	300px !important;
  }
  #bamburuncing{
  	width: 	350px !important;

  }
}


@media only screen and (min-width: 1600px) {
  #signTimeline,#signEvent{
    top: 460px !important;
  }
  #papan{
  	width: 	750px !important;
  	top: 	120px !important;
  }

  #jalesveva{
  	top: 	110px !important;
  	width: 	450px !important;
  	left: 2850px !important;
  }
  #tugu{
  	width	: 280px !important;
  	top: 	85px !important;

  }
  #monkasel{
  	width: 	700px !important;
  	top: 	500px !important;
  	left: 4300px !important;

  }
  #surabaya{
  	width: 	450px !important;
  top: 	150px !important;
  left: 	5350px !important;
  }
  #bamburuncing{
  	width: 	550px !important;
  	left: 	6150px !important;

  }
  #sayem,#socmed,#zoopik, #fesbud,#closing	 {
    top: 450px !important;
    width: 280px !important;
  }
  #moreinfo1{
  	top: 570px !important;
  	left: 3390px !important;
  	width: 	100px !important;
  }
  #moreinfo2{
  	top: 570px !important;
  	left: 4035px !important;
  	width: 	100px !important;
  }
  #moreinfo3{
  	top: 570px !important;
  	left: 5090px !important;
  	width: 	100px !important;
  }
  #moreinfo4{
  	top: 570px !important;
  	left: 5865px !important;
  	width: 	100px !important;
  }
  #moreinfo5{
  	top: 570px !important;
  	left: 6715px !important;
  	width: 	100px !important;
  }
}

#bg{
	position: fixed;
	top: -70px;
	left: -100px;
	height:110vh;
}

@media only screen and (max-height: 700px) {
  #bg {
    height: 115vh !important;
  }


}


	#tooglebar{
		position: fixed;
		/*left: 1220px;*/
		right:15%;
		top: 30px;
		z-index: 9;
		cursor: pointer;
	
		border: none;

	}
	#papan{
		position: fixed;
		left: 1550px;
		top: 15px;
	/*	bottom: 40%;*/
		z-index: 2;

	}

	#signEvent{
		position: fixed;
		left: 2550px;
		top: 325px;
		z-index: 3;

	}
	#jalesveva{
		position: fixed;
		left: 2970px;
		top: 85px;
		cursor: pointer;
		z-index: 2;

	}


	#sayem{
		position: fixed;
		left: 3300px;
		top: 325px;
		z-index: 3;
		cursor: pointer;

	}

	#moreinfo1{
		position: fixed;
		left: 3390px;
		top: 428px;
		z-index: 4;
		cursor: pointer;
		width: 70px;
		height: 20px;
		font-size: 10px;
		border-radius: 10px;
		border: none;

	}



	a{
		color: white;
		text-decoration: none;
	}

	a:hover{
		color: #2f271a;
	}



	

	#tugu{
		position: fixed;
		left: 3760px;
		top: 75px;
		cursor: pointer;

	}

	#socmed{
		position: fixed;
		left: 3940px;
		top: 325px;
		z-index: 3;
		cursor: pointer;

	}

	#moreinfo2{
		position: fixed;
		left: 4030px;
		top: 428px;
		z-index: 4;
		cursor: pointer;
		width: 70px;
		height: 20px;
		font-size: 10px;
		border-radius: 10px;
		border: none;

	}


	#monkasel{
		position: fixed;
		left: 4390px;
		top: 335px;
		cursor: pointer;

	}

	#zoopik{
		position: fixed;
		left: 5000px;
		top: 325px;
		z-index: 3;
		cursor: pointer;

	}

	#moreinfo3{
		position: fixed;
		left: 5090px;
		top: 428px;
		z-index: 4;
		cursor: pointer;
		width: 70px;
		height: 20px;
		font-size: 10px;
		border-radius: 10px;
		border: none;

	}


	#surabaya{
		position: fixed;
		left: 5430px;
		top: 87px;
		cursor: pointer;
		z-index: 2;

	}

	#fesbud{
		position: fixed;
		left: 5775px;
		top: 325px;
		z-index: 3;
		cursor: pointer;

	}

	#moreinfo4{
		position: fixed;
		left: 5870px;
		top: 420px;
		z-index: 4;
		cursor: pointer;
		width: 70px;
		height: 20px;
		font-size: 10px;
		border-radius: 10px;
		border: none;

	}
	#bamburuncing{
		position: fixed;
		left: 6280px;
		top: 110px;
		cursor: pointer;

	}

	#closing{
		position: fixed;
		left: 6625px;
		top: 325px;
		z-index: 3;
		cursor: pointer;

	}
	#moreinfo5{
		position: fixed;
		left: 6720px;
		top: 420px;
		z-index: 4;
		cursor: pointer;
		width: 70px;
		height: 20px;
		font-size: 10px;
		border-radius: 10px;
		border: none;

	}




	#jalesveva:hover, #tugu:hover, #monkasel:hover, #surabaya:hover, #bamburuncing:hover{
		transform: scale(1.10);

	}


	.modal-body{
		
	}

	@font-face {
	font-family: euphorigenic;
	src: url('font/euphorigenic.ttf');
}

@font-face {
	font-family: rutaban;
	src: url('font/rutaban.ttf');
}







 .sidebar {
  height: 100%; 
  width: 0; 
  position: fixed; 
  z-index: 5;
  top: 0;
  left: 0;
 /* color: #443926;*/
  background-color:  #ad966d;
  overflow-x: hidden; 
  padding-top: 60px; 
  transition: 0.5s; 
  text-transform: uppercase;
  font-weight: 400;
}


.sidebar .judul {
  padding: 0px 0px 0px 32px;
  text-decoration: none;
  font-family: euphorigenic;
  font-size: 25px;
  color: #443926;
  display: block;
  transition: 0.3s;
}

.sidebar .sub-judul {
  padding: 0px 0px 0px 42px;
  text-decoration: none;
  font-family: rutaban;
  font-size: 25px;
  color: #443926;
  display: block;
  transition: 0.3s;
}


.sidebar .judul:hover {
  color: black;
}


.sidebar .closebtn {
	color: #443926;
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.sidebar .closebtn:hover {
  color: black;
}
/* #skrollr-body {
    float: left;
    width: 100%;
    height: 100%;
} */
#code{
	display: 	hidden;
}

.sidebar .sub-judul:hover {
  color: black;
  font-size: 27px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar .judul {font-size: 18px;}
  .sidebar .sub-judul:hover {
  color: black;
  font-size: 27px;
}
}
        </style>
        <script type="text/javascript">
  
        </script>
		<script type="text/javascript" src="{{ url('js/skrollr.js') }}"></script>
<script type="text/javascript" src="skrollr.min.js"></script>
<script type="text/javascript">
	var s = skrollr.init();
</script>
        <body>
			<img id="bg" src="{{ asset('img/bgwebsite.png') }}" style=" z-index: -1;">
        	<div id="haha" class="container-fluid" data-0="transform:translateX(0%);" data-1000="transform:translateX(-450%);" id="skrollr-body" style="">
        				<div style="" class="">
        		
        		
        		<img id="sepik" style="width:800px" src="{{ asset('img/sepik.png') }}">
        		<img id="signTimeline" style="width:250px" src="{{ asset('img/signTimeline.png') }}">


        		<img id="papan" style="width:700px" src="{{ asset('img/papan.png') }}">

        		<img id="signEvent" style="width:250px" src="{{ asset('img/signEvent.png') }}">

        		<img id="jalesveva" style="width:340px" src="{{ asset('img/jalesveva.png') }}" data-bs-toggle="modal" data-bs-target="#jalesvevaModal">

        		<img id="sayem" style="width:250px" src="{{ asset('img/sayem.png') }}">

        		<img id="tugu" style="width:210px" src="{{ asset('img/tugu.png') }}" data-bs-toggle="modal" data-bs-target="#tuguModal">
       			<img id="socmed" style="width:250px" src="{{ asset('img/socmed.png') }}">
        		<img id="monkasel" style="width:580px" src="{{ asset('img/monkasel.png') }}" data-bs-toggle="modal" data-bs-target="#monkaselModal">
           		<img id="zoopik" style="width:250px" src="{{ asset('img/zoopik.png') }}">
        		<img id="surabaya" style="width:340px" src="{{ asset('img/surabaya.png') }}" data-bs-toggle="modal" data-bs-target="#surabayaModal">
                <img id="fesbud" style="width:250px" src="{{ asset('img/fesbud.png') }}">

        		<img id="bamburuncing" style="width:400px" src="{{ asset('img/bamburuncing.png') }}" data-bs-toggle="modal" data-bs-target="#bamburuncingModal">
           		<img id="closing" style="width:250px" src="{{ asset('img/closing.png') }}">

           		<button id="moreinfo1" style="background-color: #9c8459;color: white;"><a href="https://www.google.com">More Info</a></button>

           		<button id="moreinfo2" style="background-color: #9c8459;color: white;"><a href="https://www.google.com">More Info</a></button>

           		<button id="moreinfo3" style="background-color: #9c8459;color: white;"><a href="https://www.google.com">More Info</a></button>

           		<button id="moreinfo4" style="background-color: #9c8459;color: white;"><a href="https://www.google.com">More Info</a></button>

           		<button id="moreinfo5" style="background-color: #9c8459;color: white;"><a href="https://www.google.com">More Info</a></button>

   <!--         		<button id="tooglebar" onclick="openNav()" style="background-color: transparent;"><i class="fas fa-bars fa-2x"></i></button> -->


        
</div>
        	</div>
        		
<div id="haha2" class="container-fluid" data-0="transform:translateX(0%);" data-1000="transform:translateX(-1800%);" style="">
        		
        		<div style="" class="">
        		
        		
        		<img id="sepik" style="width:800px" src="{{ asset('img/sepik.png') }}">
        		<img id="signTimeline" style="width:250px" src="{{ asset('img/signTimeline.png') }}">


        		<img id="papan" style="width:700px" src="{{ asset('img/papan.png') }}">

        		<img id="signEvent" style="width:250px" src="{{ asset('img/signEvent.png') }}">

        		<img id="jalesveva" style="width:340px" src="{{ asset('img/jalesveva.png') }}" data-bs-toggle="modal" data-bs-target="#jalesvevaModal">

        		<img id="sayem" style="width:250px" src="{{ asset('img/sayem.png') }}">

        		<img id="tugu" style="width:210px" src="{{ asset('img/tugu.png') }}" data-bs-toggle="modal" data-bs-target="#tuguModal">
       			<img id="socmed" style="width:250px" src="{{ asset('img/socmed.png') }}">
        		<img id="monkasel" style="width:580px" src="{{ asset('img/monkasel.png') }}" data-bs-toggle="modal" data-bs-target="#monkaselModal">
           		<img id="zoopik" style="width:250px" src="{{ asset('img/zoopik.png') }}">
        		<img id="surabaya" style="width:340px" src="{{ asset('img/surabaya.png') }}" data-bs-toggle="modal" data-bs-target="#surabayaModal">
                <img id="fesbud" style="width:250px" src="{{ asset('img/fesbud.png') }}">

        		<img id="bamburuncing" style="width:400px" src="{{ asset('img/bamburuncing.png') }}" data-bs-toggle="modal" data-bs-target="#bamburuncingModal">
           		<img id="closing" style="width:250px" src="{{ asset('img/closing.png') }}">

           		<button id="moreinfo1" style="background-color: #9c8459;color: white;"><a href="https://www.google.com">More Info</a></button>

           		<button id="moreinfo2" style="background-color: #9c8459;color: white;"><a href="https://www.google.com">More Info</a></button>

           		<button id="moreinfo3" style="background-color: #9c8459;color: white;"><a href="https://www.google.com">More Info</a></button>

           		<button id="moreinfo4" style="background-color: #9c8459;color: white;"><a href="https://www.google.com">More Info</a></button>

           		<button id="moreinfo5" style="background-color: #9c8459;color: white;"><a href="https://www.google.com">More Info</a></button>

   <!--         		<button id="tooglebar" onclick="openNav()" style="background-color: transparent;"><i class="fas fa-bars fa-2x"></i></button> -->

<img id="bg" src="asset/bgwebsite.jpg" style=" z-index: -1;">
        
</div>


        	</div>

        	<img id="logo" style="height: 44px;" src="{{ asset('img/logo.png') }}">


        		<button id="tooglebar" onclick="openNav()" style="background-color: transparent;"><i class="fas fa-bars fa-2x"></i></button>

        		<p id="code"></p>


        	@extends('layouts.sidebar')





	<img id="maskot" style="width:450px; max-width: 450px;" src="{{ asset('img/maskot.png') }}">

        	<div class="modal fade" id="jalesvevaModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        		<div class="modal-dialog modal-dialog-centered">
        			<div class="modal-content" style="background-color: #f0ece4;">


        				<div class="modal-body" >
        					<button style="float: right;" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        					<h1 style="text-align: center;">Jalesveva</h1>
        					<p style="text-align:center;">Monumen Jalesveva Jayamahe atau Monjaya adalah sebuah monumen yang terletak di Kota Surabaya, Jawa Timur. Monumen ini menggambarkan sosok Perwira TNI Angkatan Laut berbusana Pakaian Dinas Upacara (PDU) lengkap dengan pedang kehormatan yang sedang menerawang ke arah laut, serasa siap menantang gelombang dan badai di lautan, begitu pula yang ingin di perlihatkan bahwa angkatan laut Indonesia siap berjaya. Patung tersebut berdiri di atas bangunan dan tingginya mencapai 30,6 meter. Monumen Jalesveva Jayamahe menggambarkan generasi penerus bangsa yang yakin dan optimis untuk mencapai cita-cita bangsa Indonesia</p>
        				</div>

        			</div>
        		</div>
        	</div>

        	<div class="modal fade" id="tuguModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        		<div class="modal-dialog modal-dialog-centered">
        			<div class="modal-content" style="background-color: #f0ece4;">

        				<div class="modal-body" >
        					<button style="float: right;" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        					<h1 style="text-align: center;">Tugu</h1>
        					<p style="text-align:center;">Monumen Jalesveva Jayamahe atau Monjaya adalah sebuah monumen yang terletak di Kota Surabaya, Jawa Timur. Monumen ini menggambarkan sosok Perwira TNI Angkatan Laut berbusana Pakaian Dinas Upacara (PDU) lengkap dengan pedang kehormatan yang sedang menerawang ke arah laut, serasa siap menantang gelombang dan badai di lautan, begitu pula yang ingin di perlihatkan bahwa angkatan laut Indonesia siap berjaya. Patung tersebut berdiri di atas bangunan dan tingginya mencapai 30,6 meter. Monumen Jalesveva Jayamahe menggambarkan generasi penerus bangsa yang yakin dan optimis untuk mencapai cita-cita bangsa Indonesia</p>
        				</div>

        			</div>
        		</div>
        	</div>

        	<div class="modal fade" id="monkaselModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        		<div class="modal-dialog modal-dialog-centered">
        			<div class="modal-content" style="background-color: #f0ece4;">

        				<div class="modal-body" >
        					<button style="float: right;" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        					<h1 style="text-align: center;">Monkasel</h1>
        					<p style="text-align:center;">Monumen Jalesveva Jayamahe atau Monjaya adalah sebuah monumen yang terletak di Kota Surabaya, Jawa Timur. Monumen ini menggambarkan sosok Perwira TNI Angkatan Laut berbusana Pakaian Dinas Upacara (PDU) lengkap dengan pedang kehormatan yang sedang menerawang ke arah laut, serasa siap menantang gelombang dan badai di lautan, begitu pula yang ingin di perlihatkan bahwa angkatan laut Indonesia siap berjaya. Patung tersebut berdiri di atas bangunan dan tingginya mencapai 30,6 meter. Monumen Jalesveva Jayamahe menggambarkan generasi penerus bangsa yang yakin dan optimis untuk mencapai cita-cita bangsa Indonesia</p>
        				</div>

        			</div>
        		</div>
        	</div>

        	<div class="modal fade" id="surabayaModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        		<div class="modal-dialog modal-dialog-centered">
        			<div class="modal-content" style="background-color: #f0ece4;">

        				<div class="modal-body" >
        					<button style="float: right;" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        					<h1 style="text-align: center;">Surabaya</h1>
        					<p style="text-align:center;">Monumen Jalesveva Jayamahe atau Monjaya adalah sebuah monumen yang terletak di Kota Surabaya, Jawa Timur. Monumen ini menggambarkan sosok Perwira TNI Angkatan Laut berbusana Pakaian Dinas Upacara (PDU) lengkap dengan pedang kehormatan yang sedang menerawang ke arah laut, serasa siap menantang gelombang dan badai di lautan, begitu pula yang ingin di perlihatkan bahwa angkatan laut Indonesia siap berjaya. Patung tersebut berdiri di atas bangunan dan tingginya mencapai 30,6 meter. Monumen Jalesveva Jayamahe menggambarkan generasi penerus bangsa yang yakin dan optimis untuk mencapai cita-cita bangsa Indonesia</p>
        				</div>

        			</div>
        		</div>
        	</div>

        	<div class="modal fade" id="bamburuncingModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        		<div class="modal-dialog modal-dialog-centered">
        			<div class="modal-content" style="background-color: #f0ece4;">

        				<div class="modal-body" >
        					<button style="float: right;" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        					<h1 style="text-align: center;">Bamburuncing</h1>
        					<p style="text-align:center;">Monumen Jalesveva Jayamahe atau Monjaya adalah sebuah monumen yang terletak di Kota Surabaya, Jawa Timur. Monumen ini menggambarkan sosok Perwira TNI Angkatan Laut berbusana Pakaian Dinas Upacara (PDU) lengkap dengan pedang kehormatan yang sedang menerawang ke arah laut, serasa siap menantang gelombang dan badai di lautan, begitu pula yang ingin di perlihatkan bahwa angkatan laut Indonesia siap berjaya. Patung tersebut berdiri di atas bangunan dan tingginya mencapai 30,6 meter. Monumen Jalesveva Jayamahe menggambarkan generasi penerus bangsa yang yakin dan optimis untuk mencapai cita-cita bangsa Indonesia</p>
        				</div>

        			</div>
        		</div>
        	</div>


        	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        	
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
