<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 p-0">
                <img class="img-blok" src="{{ asset('img/auth/batik_cokelat.png') }}" alt="batik_cokelat.png">
            </div>

            <div class="col p-4">
                <h1>{{$competition->title}}</h1>
                <form wire:submit.prevent="verifyAndNextStep">
                    @switch($steps)
                        @case(1)
                        <div class="card my-2">
                            <div class="card-body">
                                {!! $competition->intro_text !!}
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h3>Tentukan jumlah anggota</h3>
                                <label for="memberCount"
                                       class="col-md-4 col-form-label text-md-right">Jumlah anggota</label>
                                <div class="col">
                                    <select id="memberCount" wire:model.lazy="memberCount" name="memberCount"
                                            class="form-control @error('memberCount') is-invalid @enderror" required>
                                        <option value="1">1 Anggota</option>
                                        <option value="2">2 Anggota</option>
                                        <option value="3">3 Anggota</option>
                                    </select>

                                    @error('memberCount')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        @break

                        @case(2)
                        @if(!$competition->multiple_registration)
                            <div class="card my-2">
                                <div class="card-body">
                                    {!! $competition->intro_text !!}
                                </div>
                            </div>
                        @endif
                        <div class="d-grid gap-3">
                            <div class="card">
                                <div class="card-body">
                                    <h3>{{$memberCount > 1 ? 'Data anggota tim' : 'Data peserta lomba'}}</h3>
                                    @if($memberCount > 1)
                                        <p>1 tim {{$memberCount}} anggota</p>
                                    @else
                                        <p>Silakan lengkapi data dibawah</p>
                                    @endif
                                </div>
                            </div>

                            @foreach(range(1, $memberCount) as $mc)
                                <div class="card">
                                    <div class="card-header">
                                        <h3>{{$memberCount > 1 ? "Informasi anggota {$mc}" : "Informasi peserta"}}</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-grid gap-4">
                                            <div class="form-group">
                                                <label for="names.{{$mc - 1}}"
                                                       class="col-md-4 col-form-label text-md-right">Nama lengkap
                                                    {{$memberCount > 1 ? " anggota {$mc}" : " peserta"}}
                                                </label>
                                                <small>Untuk keperluan e-certificate</small>

                                                <div class="col">
                                                    <input id="names.{{$mc - 1}}" type="text"
                                                           class="form-control @error('names' . ($mc - 1)) is-invalid @enderror"
                                                           name="names.{{$mc - 1}}" wire:model.lazy="names.{{$mc - 1}}">

                                                    @error('names' . ($mc - 1))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <label for="identifications.{{$mc - 1}}"
                                                       class="col-md-4 col-form-label text-md-right">NRP / NIK
                                                    {{$memberCount > 1 ? " anggota {$mc}" : " peserta"}}
                                                </label>
                                                <small class="d-block">NIK (Untuk masyarakat umum)</small>

                                                <div class="col">
                                                    <input id="identifications.{{$mc - 1}}" type="text"
                                                           class="form-control @error('identifications' . ($mc - 1)) is-invalid @enderror"
                                                           name="identifications.{{$mc - 1}}"
                                                           required
                                                           wire:model.lazy="identifications.{{$mc - 1}}">

                                                    @error('identifications' . ($mc - 1))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="origins.{{$mc - 1}}"
                                                       class="col-md-4 col-form-label text-md-right">Asal universitas /
                                                    Instansi {{$memberCount > 1 ? " anggota {$mc}" : " peserta"}}
                                                </label>
                                                <small class="d-block">Instansi (Untuk masyarakat umum)</small>

                                                <div class="col">
                                                    <input id="origins.{{$mc - 1}}" type="text"
                                                           class="form-control @error('origins' . ($mc - 1)) is-invalid @enderror"
                                                           name="origins.{{$mc - 1}}"
                                                           required
                                                           wire:model.lazy="origins.{{$mc - 1}}">

                                                    @error('origins' . ($mc - 1))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="regions.{{$mc - 1}}"
                                                       class="col-md-4 col-form-label text-md-right">Asal daerah
                                                    {{$memberCount > 1 ? " anggota {$mc}" : " peserta"}}
                                                </label>

                                                <div class="col">
                                                    <input id="regions.{{$mc - 1}}" type="text"
                                                           class="form-control @error('regions' . ($mc - 1)) is-invalid @enderror"
                                                           name="regions.{{$mc - 1}}"
                                                           required
                                                           wire:model.lazy="regions.{{$mc - 1}}">

                                                    @error('regions' . ($mc - 1))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="upload_ids.{{$mc - 1}}"
                                                       class="col-md-4 col-form-label text-md-right">Upload KTP/KTM/SIM
                                                    {{$memberCount > 1 ? " anggota {$mc}" : " peserta"}}
                                                </label>

                                                <div class="col">
                                                    <input id="upload_ids.{{$mc - 1}}" type="file"
                                                           class="form-control @error('upload_ids' . ($mc - 1)) is-invalid @enderror"
                                                           name="upload_ids.{{$mc - 1}}"
                                                           required
                                                           wire:model.lazy="upload_ids.{{$mc - 1}}">

                                                    @error('upload_ids' . ($mc - 1))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="upload_photos.{{$mc - 1}}"
                                                       class="col-md-4 col-form-label text-md-right">Upload Foto 3x4
                                                    {{$memberCount > 1 ? " anggota {$mc}" : " peserta"}}
                                                </label>

                                                <div class="col">
                                                    <input id="upload_photos.{{$mc - 1}}" type="file"
                                                           class="form-control @error('upload_photos' . ($mc - 1)) is-invalid @enderror"
                                                           name="upload_photos.{{$mc - 1}}"
                                                           required
                                                           wire:model.lazy="upload_photos.{{$mc - 1}}">

                                                    @error('upload_photos' . ($mc - 1))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="twibbon_links.{{$mc - 1}}"
                                                       class="col-md-4 col-form-label text-md-right">Link Post Twibbon
                                                    di Instagram {{$memberCount > 1 ? " anggota {$mc}" : " peserta"}}
                                                </label>
                                                <small class="d-block">Pastikan Instagram tidak di private sampai
                                                    kegiatan berakhir</small>

                                                <div class="col">
                                                    <input id="upload_photos.{{$mc - 1}}" type="text"
                                                           class="form-control @error('twibbon_links' . ($mc - 1)) is-invalid @enderror"
                                                           name="twibbon_links.{{$mc - 1}}"
                                                           required
                                                           wire:model.lazy="twibbon_links.{{$mc - 1}}">

                                                    @error('twibbon_links' . ($mc - 1))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @break

                        @case(3)
                        <div class="card">
                            <div class="card-body">
                                <h3>Pengumpulan Berkas-Berkas Kelompok</h3>

                                <div class="d-grid gap-3">
                                    <div class="form-group">
                                        <label for="google_drive_link"
                                               class="col-md-4 col-form-label text-md-right">Link Google Drive
                                            Karya</label>
                                        <small class="d-block">Permission pada google drive harus sudah dibuka ketika
                                            pengumpulan karya. Format nama file: NamaTim_JudulKarya</small>

                                        <div class="col">
                                            <input id="google_drive_link" type="text"
                                                   class="form-control @error('google_drive_link') is-invalid @enderror"
                                                   name="google_drive_link"
                                                   required
                                                   wire:model.lazy="google_drive_link">

                                            @error('google_drive_link')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="caption"
                                               class="col-md-4 col-form-label text-md-right">Pengumpulan Caption</label>
                                        <small class="d-block">Caption dikumpulkan dalam file berbentuk PDF. Format nama
                                            file berupa: NamaTim_Caption Youtube_JudulKarya</small>

                                        <div class="col">
                                            <input id="caption" type="file"
                                                   class="form-control @error('caption') is-invalid @enderror"
                                                   name="caption"
                                                   required
                                                   wire:model.lazy="caption">

                                            @error('caption')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="originality_statement"
                                               class="col-md-4 col-form-label text-md-right">Pengumpulan Lembar
                                            Orisinalitas</label>
                                        <small class="d-block">Lembar Orisinalitas dikumpulkan dalam file berbentuk PDF.
                                            Format nama file berupa: NamaTIm_lembar-orisinalitas. Download file di link:
                                            https://tinyurl.com/SPOrisinalitasSEPIK</small>

                                        <div class="col">
                                            <input id="originality_statement" type="file"
                                                   class="form-control @error('originality_statement') is-invalid @enderror"
                                                   name="originality_statement"
                                                   required
                                                   wire:model.lazy="originality_statement">

                                            @error('originality_statement')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        @break

                        @case(4)
                        <div class="card">
                            <div class="card-body">
                                <h3>Contact person</h3>
                                <p>Cukup 1 orang sebagai perwakilan dari setiap kelompok. Kami sudah mengisikan nomor
                                    telepon dan ID line anda, tetapi anda bisa menggunakan nomor telepon atau ID line
                                    yang berbeda</p>
                                <div class="d-grid gap-3">

                                    <div class="form-group">
                                        <label for="whatsapp_no"
                                               class="col-md-4 col-form-label text-md-right">Nomor WhatsApp</label>

                                        <div class="col">
                                            <input id="whatsapp_no" type="text"
                                                   class="form-control @error('whatsapp_no') is-invalid @enderror"
                                                   name="whatsapp_no"
                                                   required
                                                   wire:model.lazy="whatsapp_no">

                                            @error('whatsapp_no')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="line_id"
                                               class="col-md-4 col-form-label text-md-right">ID Line</label>

                                        <div class="col">
                                            <input id="line_id" type="text"
                                                   class="form-control @error('line_id') is-invalid @enderror"
                                                   name="line_id"
                                                   required
                                                   wire:model.lazy="line_id">

                                            @error('line_id')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @break

                        @case(5)
                        <div class="card">
                            <div class="card-body">
                                <h3>Pembayaran Biaya Pendaftaran</h3>
                                <p>Dimohon untuk mentransfer biaya kegiatan sebesar Rp. {{$competition->nominal}} /
                                    orang ke No. rek BCA: 0101920231 a/n Michael Angelo </p>

                                <div class="alert alert-danger my-2" role="alert">
                                    <b>Penting: </b> Peserta tidak diperkenankan untuk mengundurkan diri dari Sayembara.
                                    Apabila peserta tiba-tiba mengundurkan diri, maka biaya pendaftaran tidak dapat
                                    dikembalikan.
                                </div>

                                <button type="button" class="btn btn-submit" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                    Menggunakan BCA Mobile? Tampilkan QR Bca mobile!
                                </button>

                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">QR BCA Mobile</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img width="750" src="{{asset('img/transfer-dana-lomba.jpg')}}"
                                                     alt="QR Transfer dana lomba">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Tutup
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-grid gap-3">
                                    <div class="form-group">
                                        <label for="payment_proof"
                                               class="col-md-4 col-form-label text-md-right">Foto bukti
                                            pembayaran</label>

                                        <div class="col">
                                            <input id="payment_proof" type="file"
                                                   class="form-control @error('payment_proof') is-invalid @enderror"
                                                   name="payment_proof"
                                                   required
                                                   wire:model.lazy="payment_proof">

                                            @error('payment_proof')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @break

                        @case(6)
                        <div class="card">
                            <div class="card-body">
                                <h3>MATUR NUWUN, REK !</h3>
                                <div>{!! $competition->outro_text !!}</div>
                            </div>
                        </div>
                        <div class="alert alert-info my-2" role="alert">
                            Data pendaftaran anda sedang di verifikasi, anda dapat menutup halaman ini sekarang.
                        </div>
                        @break

                    @endswitch

                    @if($canContinue)
                        <button type="submit" class="btn btn-submit mt-3">
                            Lanjutkan
                        </button>
                    @endif
                </form>
            </div>

            <div class="col-3 align-self-end text-center pb-5 mb-5">
                <img class="img-mascot" src="{{ asset('img/auth/epik.png') }}" alt="epik.png">
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
            integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var screenWidth = window.screen.width;

            if (screenWidth <= 400) {
                $('#haha2').show();
                $('#haha').hide();


            } else {
                $('#haha').show();
                $('#haha2').hide();

            }


        });


        var s = skrollr.init();
        // $("body").fadeOut(1000, function(){redirectPage('home.html')});
        // 		$( "#banner" ).click(function() {
        //   $("body").fadeOut(1000);
        //   location.replace("https://www.w3schools.com");
        // });

        // $('.container-fluid').attr('data-1000','transform:translateX(-900%)');
        // alert($('.container-fluid').attr('data-1000'));
        $(document).on('click', "#banner", function (event) {
            event.preventDefault();
            linkLocation = 'www.youtube.com';
            $("body").fadeOut(1000, function () {
                location.replace("login.html")
            });
        });


        function openNav() {
            document.getElementById("mySidebar").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }

        /* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
        }

    </script>
</div>
