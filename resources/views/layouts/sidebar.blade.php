<div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <img style="width:150px;margin-left: 40px; margin-top: -30px;" src="{{ asset('img/iconwhite.png') }}">
    <hr style="height:10px;border-width: 0px; background-color:
#41464b; width: 80%; margin-left: 25px; margin-top: -7px;">
    <a class="judul" href="/">Home</a>
    <h6 id="about" class="judul" href="#">About</h6>
  <h6 id = "timeline" class="judul" href="#papan">Timeline</h6>
  @if(Auth::check())
  <a class="judul" href="/logout">Log Out</a>
  @else
  <a class="judul" href="/login">Login</a>
  @endif
  <a class="judul" href="/vote">Vote</a>
  <h6 id="event" class="judul" href="#signEvent">Events</h6>
    <a class="sub-judul" href="/sayembara">Sayembara</a>
    <a class="sub-judul" href="{{ route('social-media-movement') }}">Social Media Movement</a>
    <a class="sub-judul" href="/donasi">Penggalangan Dana</a>
    <a class="sub-judul" href="{{ route('registrasi-fesbud') }}">Festival Budaya</a>
    <a class="sub-judul" href="/zoopikRegistration">Zoopik</a>
    <a class="sub-judul" href="{{ route('user-dashboard') }}">User Dashboard</a>
    <a class="sub-judul" href="#">Closing Ceremony</a>
    <hr style="height:10px;border-width: 0px; background-color:
#41464b; width: 80%; margin-left: 25px;  margin-top: -3px;">
    <a class="judul" href="#">Contact</a>
    <a class="sub-judul" href="https://www.instagram.com/surabayaepik/" style="font-size: 20px; padding-left: 32px;"><i class="fab fa-instagram"></i> @surabayaepik</a>
  <a class="sub-judul" href="https://www.tiktok.com/@surabayaepik" style="font-size: 20px; padding-left: 32px;"><i class="bi bi-tiktok"></i> @surabayaepik</a>
  <a class="sub-judul" href="https://www.youtube.com/channel/UChm5YV56M5Uo4gN0O92jWVw" style="font-size: 20px; padding-left: 32px;"><i class="fab fa-youtube"></i> @surabayaepik</a>
    <a class="sub-judul" href="https://www.gmail.com/" style="font-size: 20px; padding-left: 32px;"><i class="far fa-envelope"></i> surabayaepik@gmail.com</a>


    <!-- <a href="#">Contact</a> -->
</div>

<script>
          	$('#about').click(function() {
      		$('#haha').css("transform", "translateX(-0%)");
      		closeNav();

});


      	$('#event').click(function() {
      		$('#haha').css("transform", "translateX(-145.88%)");
      		closeNav();

});

      	$('#timeline').click(function() {
      		$('#haha').css("transform", "translateX(-60.88%)");
      		closeNav();

});
</script>
