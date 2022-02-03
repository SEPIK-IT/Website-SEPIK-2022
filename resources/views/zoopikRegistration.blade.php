@extends('layouts.authLayout')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">

        <div class="col-2 p-0" style="height: 100vh">
            <img class="img-blok" src="{{ asset('img/auth/batik_cokelat.png') }}" alt="batik_cokelat.png">
        </div>

        <div class="col align-self-center p-4">
            <div class="h1">Daftar Zoopik</div>

            <div class="">
                <div class="text-body">
                    <form method="POST" action="/zoopikRegistration" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mt-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nama Lengkap</label>

                            <div class="col">
                                <input id="name" type="text" class="form-control"
                                    name="name" value="{{ $username }}" readonly>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="nrp" class="col-md-4 col-form-label text-md-right">NRP (Nomor Induk Pokok)</label>

                            <div class="col">
                                <input id="nrp" type="text" class="form-control @error('nrp') is-invalid @enderror"
                                    name="nrp" value="{{ old('nrp') }}" required>

                                @error('nrp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="asalUniv" class="col-md-4 col-form-label text-md-right">Asal Universitas</label>

                            <div class="col">
                                <input id="asalUniv" type="text" class="form-control @error('asalUniv') is-invalid @enderror"
                                    name="asalUniv" value="{{ old('asalUniv') }}" required>

                                @error('asalUniv')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="ktm" class="col-md-4 col-form-label text-md-right">Kartu Tanda Mahasiswa</label>

                            <div class="col">
                                <input id="ktm" type="file" class="form-control @error('ktm') is-invalid @enderror"
                                    name="ktm" required>

                                @error('ktm')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="foto" class="col-md-4 col-form-label text-md-right">Foto 3 x 4</label>

                            <div class="col">
                                <input id="foto" type="file" class="form-control @error('foto') is-invalid @enderror"
                                    name="foto" required>

                                @error('foto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col">
                                <button type="submit" class="btn btn-submit my-4">
                                    Daftar
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