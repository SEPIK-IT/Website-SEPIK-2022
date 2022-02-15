<x-layout-with-sidebar>
    <div class="my-4">
        @if(session('message'))
            <div class="alert alert-{{session('message')['status']}}">
                {{session('message')['message']}}
            </div>
        @endif
    </div>

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
                    <div class="d-flex align-items-center justify-content-center"
                    style="cursor: pointer; background-color: rgba(68, 57, 38, 255) !important; color: white !important; border-radius: 80px; height: 50px; width: 25%;"
                    onclick="location.href='{{route('dlsocial')}}'">
                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-download text-white ms-2" viewBox="0 0 16 16">
                       <path
                           d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                       <path
                           d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                   </svg>
                   <div class="ms-2 text-white" style="color: white;">Download SOP</div>
                   </div>
                   <div class="d-flex align-items-center justify-content-center mx-3"
                    style="cursor: pointer; background-color: rgba(68, 57, 38, 255) !important; color: white !important; border-radius: 80px; height: 50px; width: 25%;"
                    onclick="location.href='{{route('dlwawancara')}}'">
                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-download text-white ms-2" viewBox="0 0 16 16">
                       <path
                           d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                       <path
                           d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                   </svg>
                   <div class="ms-2 text-white" style="color: white;">Download Booklet Wawancara</div>
                   </div>
                   <div class="d-flex align-items-center justify-content-center"
                    style="cursor: pointer; background-color: rgba(68, 57, 38, 255) !important; color: white !important; border-radius: 80px; height: 50px; width: 25%;"
                    onclick="location.href='{{route('dloutput')}}'">
                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-download text-white ms-2" viewBox="0 0 16 16">
                       <path
                           d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                       <path
                           d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                   </svg>
                   <div class="ms-2 text-white" style="color: white;">Download Booklet Output</div>
                   </div>
                @if(!$socialMediaMovement->exists())
                    <div class="alert alert-warning">
                        Anda belum mendaftar Social Media Movement, yuk <a href="{{route('social-media-movement')}}">Daftar sekarang!</a>
                    </div>
                @else
                    <div class="d-grid gap-3">
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">Anda / tim sudah terdaftar!</h4>
                            <p>Terima kasih sudah melakukan pendaftaran Social Media Movement SEPIK 2022! <br>
                                Untuk informasi yang berkaitan dengan kegiatan ini, peserta dapat bergabung dalam Grup Line
                                melalui link: <a
                                    href="https://line.me/ti/g2/PDH1E_d9QvrYlPKRxJjfPBhBi2SHnBw-WpATWA?utm_source=invitation&utm_medium=link_copy&utm_campaign=default">https://line.me/ti/g2/PDH1E_d9QvrYlPKRxJjfPBhBi2SHnBw-WpATWA?utm_source=invitation&utm_medium=link_copy&utm_campaign=default</a>
                            </p>
                        </div>

                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">Langkah kedua</h4>
                            <p>
                                Silakan pilih jadwal Interview dengan cara mengklik link ini: <br>
                                <a href="{{route('social-media-movement.pengmas.index')}}">{{route('social-media-movement.pengmas.index')}}</a>
                                <br>
                                <b>Pastikan pendaftaran anda sudah diverifikasi!</b>
                            </p>
                        </div>
                    </div>

                @endif
            </div>
        </div>
    </div>
</x-layout-with-sidebar>
