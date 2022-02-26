<x-layout-with-sidebar title="Daftar Social Media Movement - Surabaya Epik 2022">
    {{-- @if(\App\Models\SocialMediaMovement::where('user_id', auth()->user()->id)->first()) --}}

        <div class="card my-2">
            <div class="card-body">
                <div class="my-2">
                    <h3>
                        Pendaftaran Social Media Movement (Pengabdian Masyarakat) SEPIK 2022
                    </h3>
                    <p>
                        Halo Arek-Arek Epik! ✨ <br> <br>

                        Sejak COVID-19 melanda, fokus masyarakat menjadi lebih tertuju pada isu kesehatan dan
                        ekonomi
                        yang
                        mengakibatkan turunnya kepekaan terhadap isu-isu lainnya, khususnya isu kebudayaan. Nah!
                        Kali
                        ini
                        Surabaya Epik (SEPIK) 2022 mengajak kamu untuk berkreasi dan ikut andil dalam melestarikan
                        budaya
                        Surabaya bersama arek-arek Surabaya dengan mengikuti Social Media Movement.
                        Melalui kegiatan ini, arek-arek Epik diharapkan dapat lebih mencintai kebudayaan Surabaya
                        dan
                        memperkenalkan komunitas budaya kepada masyarakat umum, khususnya para generasi muda.😍🔥
                        <br>
                    </p>
                </div>
                <hr>
                <div class="my-2">
                    <h3>Link SOP</h3>
                    <div class="d-flex row ms-1">
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
                    <div class="d-flex align-items-center justify-content-center"
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
                </div>
                </div>
                <hr>
                <div class="my-3">
                    <h3>
                        Timeline Kegiatan:
                    </h3>
                    <ul>
                        <li>
                            <h4>Pendaftaran</h4>
                            <p><b>7 Februari 2022 - 13 Februari 2022</b></p>
                        </li>
                        <li>
                            <h4>Social Media Movement (Pengabdian Masyarakat)</h4>
                            <p><b>16 Februari 2022 - 27 Februari 2022</b></p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="alert alert-warning" role="alert">
            <h4 class="alert-heading">Pendaftaran Social Media Movement Sudah Resmi Ditutup!</h4>
            <p>Terima kasih sudah melakukan pendaftaran Social Media Movement SEPIK 2022!
            </p>
        </div>
    {{-- @else
        <livewire:social-media-movement-form/>
    @endif --}}

</x-layout-with-sidebar>
