<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 p-0">
                <img class="img-blok" src="{{ asset('img/auth/batik_cokelat.png') }}" alt="batik_cokelat.png">
            </div>

            <div class="col p-4">
                <h1>Contest Registration</h1>
                @if(!$thankyou)
                    <div class="text-body">
                        <form wire:submit.prevent="submit" method="POST">

                            {{-- Data form --}}
                            @csrf
                            {{-- <input type="hidden" name="_method" value="PATCH"> --}}

                            <div class="form-group mt-5">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>
                                <div class="d-flex my-2">
                                    <input id="name" readonly type="text"
                                           class="form-control @error("names.0") is-invalid @enderror"
                                           placeholder="Masukkan nama anggota"
                                           name="name" wire:model="names.0"
                                           required>
                                </div>
                                @error("names.0")
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror

                                @if($competition->multiple_registration)
                                    <div class="d-flex my-2">
                                        <input id="name" type="text"
                                               class="form-control @error("names.1") is-invalid @enderror"
                                               placeholder="Masukkan nama anggota"
                                               name="name" wire:model="names.1">
                                    </div>
                                    @error("names.1")
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <div class="d-flex my-2">
                                        <input id="name" type="text"
                                               class="form-control @error("names.2") is-invalid @enderror"
                                               placeholder="Masukkan nama anggota"
                                               name="name" wire:model="names.2">
                                    </div>
                                    @error("names.2")
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                @endif

                                @if($competition->multiple_registration) <small>Maksimal 3 anggota, 2 lainnya
                                    opsional</small> @endif
                            </div>

                            <div class="form-group my-3">
                                <label for="nominal"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Nominal Transfer') }}</label>

                                <div class="col">
                                    <input id="nominal" readonly type="text"
                                           class="form-control @error('nominal') is-invalid @enderror"
                                           name="nominal" wire:model="nominal" required autocomplete="nominal"
                                           autofocus>

                                    @error('nominal')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group my-3">
                                <label for="category"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Kategori') }} </label>

                                <div class="col">
                                    <select id="category" wire:model="category" name="category"
                                            class="form-control @error('category') is-invalid @enderror" required>
                                        <option value="mahasiswa">Mahasiswa</option>
                                        <option value="umum">Umum</option>
                                    </select>

                                    @error('category')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            @if($category === 'mahasiswa')
                                <div class="form-group my-3">
                                    <label for="university"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Asal Universitas') }}</label>

                                    <div class="col">
                                        <input id="university" type="text"
                                               class="form-control @error('university') is-invalid @enderror"
                                               name="asalUniv" wire:model="university" autocomplete="university">

                                        @error('university')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            @else
                                <div class="form-group my-3">
                                    <label for="region"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Asal Instansi') }}</label>

                                    <div class="col">
                                        <input id="region" type="text"
                                               class="form-control @error('region') is-invalid @enderror"
                                               name="region" wire:model="region" autocomplete="region">

                                        @error('region')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            @endif

                            <div class="form-group my-3">
                                <label for="twibbon"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Link ke postingan twibbon') }}</label>

                                <div class="col">
                                    <input id="twibbon" type="text"
                                           class="form-control @error('twibbon') is-invalid @enderror"
                                           name="twibbon" wire:model="twibbon">

                                    @error('twibbon')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <small>Silakan upload twibbon ke Instagram anda, lalu tempelkan link.</small>
                            </div>

                            <div class="form-group my-3">
                                <label for="google_drive_link"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Link Google Drive (Hasil Karya + Caption PDF)') }}</label>

                                <div class="col">
                                    <input id="google_drive_link" type="text"
                                           class="form-control @error('google_drive_link') is-invalid @enderror"
                                           name="google_drive_link" wire:model="google_drive_link">

                                    @error('google_drive_link')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group my-3">
                                <label for="proof"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Bukti Transfer') }}</label>

                                <div class="col">
                                    <input id="buktiTransfer" type="file"
                                           class="form-control @error('proof') is-invalid @enderror"
                                           name="proof" wire:model="proof" required>

                                    @error('proof')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <small>Silakan lakukan transfer sesuai nominal dan upload bukti pembayaran</small>
                            </div>

                            <div class="form-group">
                                <div class="col">
                                    <button type="submit" class="btn btn-submit my-5">
                                        {{ __('Daftar dan Kumpulkan Karya') }}
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                @else
                    <h2>Terima kasih sudah mendaftar! Anda bisa melihat status pendaftaran anda di dashboard.</h2>
                    <h3>Jangan lupa gabung ke grup line kategori lomba yang anda ikuti: <a
                            href="{{$competition->line_group_link}}">{{$competition->line_group_link}}</a></h3>
                @endif
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
