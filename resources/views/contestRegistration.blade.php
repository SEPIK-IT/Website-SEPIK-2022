<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="/css/contestRegist.css">
    <title>Contest Registration</title>
</head>

<body class="bg">
    <div class="container-fluid" >
        <div class="row">
            <div class="col-2 p-0">
                <img class="img-blok" src="{{ asset('img/auth/batik_cokelat.png') }}" alt="batik_cokelat.png">
            </div>
    
            <div class="col p-4">
                <h1>Contest Registration</h1>
    
                <div class="text-body">
                    <form action="#" method="POST">
                        
                        {{-- Data form --}}
                        @csrf
                            {{-- <input type="hidden" name="_method" value="PATCH"> --}}

                            <div class="form-group mt-5">
                                <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                                <div class="col">
                                    <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror"
                                        name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>

                                    @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group my-3">
                                <label for="nominal" class="col-md-4 col-form-label text-md-right">{{ __('Nominal') }}</label>

                                <div class="col">
                                    <input id="nominal" type="text" class="form-control @error('nominal') is-invalid @enderror"
                                        name="nominal" value="{{ old('nominal') }}" required autocomplete="nominal" autofocus>

                                    @error('nominal')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group my-3">
                                <label for="kategori" class="col-md-4 col-form-label text-md-right">{{ __('Kategori') }} </label>

                                <div class="col">
                                    <select id="kategori" name="kategori" class="form-control @error('kategori') is-invalid @enderror" required>
                                        <option value="none" selected disabled hidden>Pilih kategori... <i class="fas fa-caret-down"></i></option> 
                                        <option value="mahasiswa">Mahasiswa</option>
                                        <option value="umum">Umum</option>
                                    </select>

                                    @error('kategori')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="divAsalUniv" class="form-group my-3" style="display: none;">
                                <label for="asalUniv" class="col-md-4 col-form-label text-md-right">{{ __('Asal Universitas') }}</label>

                                <div class="col">
                                    <input id="asalUniv" type="text" class="form-control @error('asalUniv') is-invalid @enderror"
                                        name="asalUniv" value="{{ old('asalUniv') }}" autocomplete="asalUniv" autofocus>

                                    @error('asalUniv')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group my-3">
                                <label for="buktiTransfer" class="col-md-4 col-form-label text-md-right">{{ __('Bukti Transfer') }}</label>

                                <div class="col">
                                    <input id="buktiTransfer" type="file" class="form-control @error('buktiTransfer') is-invalid @enderror"
                                        name="buktiTransfer" value="{{ old('buktiTransfer') }}" required autocomplete="buktiTransfer" autofocus>

                                    @error('buktiTransfer')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col">
                                    <button type="submit" class="btn btn-submit my-5">
                                        {{ __('Daftar') }}
                                    </button>
                                </div>
                            </div>
                        
                    </form>
                </div>
            </div>
    
            <div class="col-3 align-self-end text-center pb-5 mb-5">
                <img class="img-mascot" src="{{ asset('img/auth/epik.png') }}" alt="epik.png">
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        // const inputKategori = document.getElementById('kategori')

        // inputKategori.addEventListener('change', (e) => {
        //     if(e.value == 'mahasiswa'){
        //         document.getElementById('divAsalUniv').style.display = 'block'
        //     }else{
        //         document.getElementById('divAsalUniv').style.display = 'none'
        //     }
        // })

        $('select').change(function(){
            if ($(this).val() == 'mahasiswa') {
                $('#divAsalUniv').show()
            } else {
                $('#divAsalUniv').hide()
            }
        })
    </script>
</body>
</html>