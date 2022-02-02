@extends('layouts.authLayout')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">

            <div class="col-2 p-0">
                <img class="img-blok" src="{{ asset('img/auth/batik_cokelat.png') }}" alt="batik_cokelat.png">
            </div>

            <div class="col align-self-center p-4">
                <div class="h1">{{ __('Daftar') }}</div>

                <div class="">
                    <div class="text-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            {{-- <input type="hidden" name="_method" value="PATCH"> --}}

                            <div class="form-group mt-3">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                                <div class="col">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mt-2">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>

                                <div class="col">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mt-2">
                                <label for="phone"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nomor Telpon') }}</label>

                                <div class="col">
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                        name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mt-2">
                                <label for="line_id"
                                    class="col-md-4 col-form-label text-md-right">{{ __('ID LINE') }}</label>

                                <div class="col">
                                    <input id="line_id" type="text"
                                        class="form-control @error('line_id') is-invalid @enderror" name="line_id"
                                        value="{{ old('line_id') }}" required autocomplete="line_id">

                                    @error('line_id')
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
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Konfirmasi Kata Sandi') }}</label>

                                <div class="col">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <div class="col text-end mt-2">
                                <p>Sudah memiliki akun? <a href="{{ route('login') }}" class="link-page"><b>Masuk Rek!</b></a></p>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col">
                                    <button type="submit" class="btn btn-submit my-4">
                                        {{ __('Daftar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <div class="col-3 align-self-end text-center pb-5 mb-5">
                <img class="img-mascot" src="{{ asset('img/auth/epik.png') }}" alt="epik.png">
            </div>

        </div>
    </div>
@endsection
