<x-layout-with-sidebar>
    <div class="d-grid gap-4">

        <div class="d-grid gap-2">
            <img src="{{asset('img/header-form-sepik.png')}}" alt="banner" class="img-fluid rounded">
            <div class="card">
                <div class="card-body">
                    <h4>Selamat datang, {{auth()->user()->name}}</h4>
                </div>
            </div>
        </div>

        <div class="d-grid gap-3">
            <div>
                <h3>Sayembara yang diikuti</h3>
                <p>Berikut adalah sayembara yang anda / tim anda ikuti. <b>Bila ada karya yang belum diupload, segera
                        upload karya sebelum masa jatuh tempo!</b></p>
                <div class="alert alert-secondary my-2" role="alert">
                    Anda dapat mengikuti lebih dari satu sayembara. Bila ingin mendaftar lagi, <a
                        href="{{route('sayembara')}}" target="_blank"> klik disini!</a>
                </div>

                <div class="row row-cols-1 row-cols-lg-3 g-4">
                    @foreach($competitions as $registered)
                        <div class="col">
                            <div class="card h-100">
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

            <hr>

            <div>
                <h3>Social media movement</h3>
                <p>Yuk, berkreasi dan ikut andil dalam melestarikan budaya Surabaya bersama arek-arek Surabaya dengan
                    mengikuti Social Media Movement! Daftarkan dirimu atau tim mu sekarang!</p>

                @if(!$socialMediaMovement->exists())
                @else
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Anda / tim sudah terdaftar!</h4>
                        <p>Terima kasih sudah melakukan pendaftaran Social Media Movement SEPIK 2022! <br>
                            Untuk informasi yang berkaitan dengan kegiatan ini, peserta dapat bergabung dalam Grup Line
                            melalui link: <a
                                href="https://line.me/ti/g2/PDH1E_d9QvrYlPKRxJjfPBhBi2SHnBw-WpATWA?utm_source=invitation&utm_medium=link_copy&utm_campaign=default">https://line.me/ti/g2/PDH1E_d9QvrYlPKRxJjfPBhBi2SHnBw-WpATWA?utm_source=invitation&utm_medium=link_copy&utm_campaign=default</a>
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layout-with-sidebar>
