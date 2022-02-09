<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>...</title>
    <link rel="stylesheet" href="{{ asset('css/splashScreen.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    {{-- <script>
        var seconds=0;
        function timer(){
            seconds += 1;
        }
        setInterval(timer, 1000);

        function redirectPage(){
            window.location.href='/home';
        }
        setTimeout(redirectPage, 2500);
    </script> --}}
</head>

<body>
    <div class="container-fluid">
        <div class="d-flex justify-content-center align-items-end" style="height: 60vh;">
            <div class="text-center">
                <p class="fs-4">Anda telah berhasil mendaftar zoopik!</p>
                <p class="fs-4">Mohon bergabung dengan OpenChat LINE Zoopik pada link berikut:</p>
                <ul>
                    <li class="fs-4">OpenChat ZOOPIK 18 Februari 2022 : <a class="fs-5" href="https://bit.ly/OClineZoopik18Feb2022">https://bit.ly/OClineZoopik18Feb2022</a> </li>
                    <li class="fs-4">OpenChat ZOOPIK 4 Maret 2022 : <a class="fs-5" href="https://bit.ly/OCLineZoopik4Maret2022">https://bit.ly/OCLineZoopik4Maret2022</a> </li>
                </ul>
                <p class="fs-4">Jika telah bergabung, tekan tombol dibawah untuk kembali ke halaman home</p>
            </div>
            
            {{-- <div class="dot">
                <figure></figure>
                <figure></figure>
                <figure></figure>
                <figure></figure>
                <figure></figure>
            </div> --}}
        </div>
        <div class="text-center">
            <a href="/home" class="btn btn-outline-dark fs-5">Home</a>
        </div>
    </div>

</body>

</html>