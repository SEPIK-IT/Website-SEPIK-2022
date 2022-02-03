@extends('layouts.authLayout')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center" style="height: 100vh">

            <div class="col-2 p-0">
                <img class="img-blok" src="{{ asset('img/auth/batik_cokelat.png') }}" alt="batik_cokelat.png">
            </div>

            <div class="col align-self-center p-4">
                <div class="h1">{{ __('Masuk') }}</div>

                <div class="">
                    <div class="text-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            {{-- <input type="hidden" name="_method" value="PATCH"> --}}

                            <div class="form-group mt-3">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>

                                <div class="col">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mt-2">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Kata Sandi') }}</label>

                                <div class="col">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mt-2">
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Ingat Saya') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col">
                                    <button type="submit" class="btn btn-submit my-4">
                                        {{ __('Masuk') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mt-4" style="background-color: transparent">
                    <div class="card-body text-center">
                        <h5 class="mt-3">Belum punya akun?</h5>
                        <p>Buat rek!</p>
                                <button type="submit" class="btn btn-submit-2 my-2" onclick="location.href='{{route('register')}}'">
                                    {{ __('Daftar Di Sini') }}
                                </button>
                    </div>
                </div>

                <div class="col">
                    <a href="/" class="btn btn-submit my-4">
                        {{ __('Kembali ke halaman utama') }}
                    </a>
                </div>
            </div>

            <div class="col-3 align-self-end text-center pb-5 mb-5">
                <img class="img-mascot" src="{{ asset('img/auth/apik.png') }}" alt="apik.png">
            </div>

        </div>
    </div>
@endsection
