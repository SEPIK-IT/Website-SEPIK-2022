@extends('layouts.app')

@section('content')

<!-- css for donasi -->
<link rel="stylesheet" href="css/donasi.css">

<body>
	<div class="container">
		<!-- heading / judul -->
		<div class="mt-4 p-5 rounded bold text-center">
		    <h1>DONASI SEPIK 2022</h1> 
		    <p>yok donasi yok balallalalall karena uang yang anda donasikan blalalalla</p> 
		</div>

		<!-- Data Pendonasi -->

		 <div class="row justify-content-center px-4">
		 	<div class="col-sm-12 col-md-8 col-xl-6 ">
		 		<form action="" method="POST">

		 		<!-- nama -->
		 		<div class="mb-5">
					<label for="nama" class="form-label"><h4>NAMA</h4></label>
					<input type="text" class="form-control" id="nama" placeholder="Nama" name="nama">
				</div>

				<!-- univ -->
				<div class="mb-5">
				  	<label for="univ" class="form-label"><h4>ASAL UNIVERSITAS</h4></label>
					<select class="form-select" name="univ">
					  	<option value="ukp">		Universitas Kristen Petra</option>
					  	<option value="uc">			Universitas Ciputra</option>
					  	<option value="wm">			Universitas Katolik Widya Mandala</option>
						<option value="ubaya">		Universitas Surabaya</option>
						<option value="external">	External</option>
					</select>
				</div>

				<!-- nominal -->
				<div class="mb-5">
					<label for="nominal" class="form-label"><h4>NOMINAL</h4></label>
					<div class="input-group">
					    <span class="input-group-text rp text-white">Rp. </span>
					    <input type="number" class="form-control" placeholder="Nominal">
					</div>
				</div>

				<!-- bukti -->
				<div class="mb-5">
					
					<label for="bukti" class="form-label "><h4>UPLOAD BUKTI TRANSFER</h4></label>

					<!-- img container -->
					<div class="col-sm-12 mb-3">
						<img class="img-fluid imgBukti" src="http://placehold.it/180" data-bs-toggle="modal" data-bs-target="#imgModal"/>
					</div>
					
  					<input class="form-control" type="file" id="bukti" onchange="readURL(this)">
				</div>
				
				

				<!-- pesan -->
				<div class="mb-5">
				  	<label for="pesan" class="form-label"><h4>KESAN PESAN</h4></label>
				  	<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Tulis pesanmu untuk doi" name="pesan"></textarea>
				</div>

				<!-- submit -->
				<div class="mb-5">
					<div class="d-grid gap-2">
					  <button class="btn btn-sepik" type="submit">SUBMIT</button>
					</div>
				</div>
				</form>
		 	</div>
		 </div>
	</div>

	<!-- Modal Preview image-->
	<div class="modal fade" id="imgModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">BUKTI TRANSFER</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
	        <div class="col-sm-12 mb-3">
				<img class="img-fluid imgBukti" src="http://placehold.it/180" data-bs-toggle="modal" data-bs-target="#imgModal" style="max-width: 100%;" />
			</div>
	      </div>
	    </div>
	  </div>
	</div>
</body>
</html>

<!-- jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="js/donasi.js"></script>

@endsection