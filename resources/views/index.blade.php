<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/splash-styles.css') }}" rel="stylesheet"/>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <title>Document</title>
  </head>
  <body>
    <img class="awan awan-2" src="{{ asset('img/awan.png') }}" alt="" />
    <img class="awan awan-1" src="{{ asset('img/awan.png') }}" alt="" />
    <img class="awan awan-3" src="{{ asset('img/awan.png') }}" alt="" />
    <img class="awan awan-4" src="{{ asset('img/awan.png') }}" alt="" />
    <img class="awan awan-5" src="{{ asset('img/awan.png') }}" alt="" />
    <img class="awan awan-6" src="{{ asset('img/awan.png') }}" alt="" />
    <img class="awan awan-7" src="{{ asset('img/awan.png') }}" alt="" />
    <img class="awan awan-8" src="{{ asset('img/awan.png') }}" alt="" />

    <div class="container-fluid">
      <div class="row set-height">
        <div class="col-4">
          <section class="section-1">
            <h2 class="text text-1">Mangun karsa kalih Rasa</h2>
          </section>
        </div>
        <div class="col-4">
          <section class="section-2">
            <h2 class="text text-2">Mangun karsa kalih Rasa</h2>
          </section>
        </div>
        <div class="col-4">
          <section class="section-3">
            <h2 class="text text-3">Mangun karsa kalih Rasa</h2>
          </section>
        </div>
      </div>
      <div class="row set-height">
        <div class="col-4">
          <section class="section-4">
            <h2 class="text text-4">Mangun karsa kalih Rasa</h2>
          </section>
        </div>
        <div class="col-4">
          <section class="section-5">
            <h2 class="text text-5">Mangun karsa kalih Rasa</h2>
          </section>
        </div>
        <div class="col-4">
          <section class="section-6">
            <h2 class="text text-6">Mangun karsa kalih Rasa</h2>
          </section>
        </div>
      </div>
      <div class="row set-height">
        <div class="col-4">
          <section class="section-4">
            <h2 class="text text-4">Mangun karsa kalih Rasa</h2>
          </section>
        </div>
        <div class="col-4">
          <section class="section-5">
            <h2 class="text text-5">Mangun karsa kalih Rasa</h2>
          </section>
        </div>
        <div class="col-4">
          <section class="section-6">
            <h2 class="text text-6">Mangun karsa kalih Rasa</h2>
          </section>
        </div>
      </div>
    </div>
    <div class="div-logo-sepik">
      <img class="logo-sepik" src="{{ asset('img/sepik2022.png') }}" alt="" />
    </div>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
      integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
    <script>
      const text = document.querySelectorAll(".text");
      for (let i = 0; i < text.length; i++) {
        text[i].innerHTML = text[i].textContent.replace(
          /\S/g,
          "<span class='letter'>$&</span>"
        );
      }
      const element = document.querySelectorAll("span");
      j = 0;
      for (let i = 0; i < element.length; i++) {
        if (i % 20 == 0) {
          j = 0;
        }
        element[i].style.animationDelay = j * 0.05 + "s";
        j++;
      }

         var timer = setTimeout(function() {
            window.location='/home'
        }, 5000);
    </script>
  </body>
</html>
