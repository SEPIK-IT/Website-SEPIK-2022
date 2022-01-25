@extends('layouts.app')

@section('content')

<!-- css for donasi -->
<link rel="stylesheet" href="/css/donasi.css">

<body>
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

</body>

@endsection
