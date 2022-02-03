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
    <script>
        var seconds=0;
        function timer(){
            seconds += 1;
        }
        setInterval(timer, 1000);

        function redirectPage(){
            window.location.href='/home';
        }
        setTimeout(redirectPage, 2500);
    </script>
</head>

<body>
    <div class="container-fluid">
        <div class="d-flex justify-content-center" style="height: 100vh;">
                <div class="align-self-center text-center">
                    <p class="fs-4">Selamat! Akun anda telah terdaftar!</p>
                    <p class="fs-4">Tunggu beberapa saat untuk kembali ke halaman utama dan lakukan log in!</p>
                </div>
                <div class="dot">
                    <figure></figure>
                    <figure></figure>
                    <figure></figure>
                    <figure></figure>
                    <figure></figure>
                </div>

        </div>
    </div>

</body>

</html>
