<x-layout-with-sidebar>
    <div class="d-grid gap-4">
        <div class="card">
            <div class="card-body">
                <h1>Dashboard pengguna</h1>
                <h4>Selamat datang, {{auth()->user()->name}}, berikut adalah data registrasi anda di Surabaya Epik
                    2021</h4>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3>Sayembara yang diikuti</h3>
            </div>
            <div class="card-body">
                <p>Berikut adalah sayembara yang anda / tim anda ikuti. <b>Bila ada karya yang belum diupload, segera
                        upload karya sebelum masa jatuh tempo!</b></p>

                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach($competitions as $registered)
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{\Illuminate\Support\Str::replace('PENDAFTARAN SAYEMBARA SEPIK 2022 - ', '', $registered->competition->title)}}</h5>
                                    @if($registered->competition->is_opened)
                                        <p>Submisi karya dibuka! anda masih bisa mengupload karya</p>
                                    @else
                                        <p>Submisi karya ditutup! anda tidak dapat mengupload karya lagi</p>
                                    @endif
                                    @switch($registered->verification_status)
                                        @case('VERIFIED')
                                        <div class="alert alert-success" role="alert">
                                            Karya anda sudah diverifikasi dan terdaftar dalam sayembara!
                                        </div>
                                        @break

                                        @case('WORKS_UNUPLOADED')
                                        <div class="alert alert-danger" role="alert">
                                            <b>Perhatian!</b> anda atau tim anda belum mengupload karya. Segera upload
                                            karya!
                                        </div>
                                        @if($registered->competition->is_opened)
                                            <button class="btn btn-submit">Upload karya</button>
                                        @endif
                                        @break

                                        @case('UNVERIFIED')
                                        <div class="alert alert-warning" role="alert">
                                            Karya anda atau tim anda belum diverifikasi oleh tim Surabaya Epik 2022.
                                        </div>
                                        @break

                                    @endswitch

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</x-layout-with-sidebar>
