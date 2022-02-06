<div>
    <form wire:submit.prevent="verifyAndNextStep">
        @switch($currentStep)
            @case(1)
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
                        <p>Link SOP disini</p>
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
                <h4 class="alert-heading"><p>Informasi penting</p></h4>
                <ol>
                    <li>
                        Setiap peserta nantinya diwajibkan untuk melampirkan link Google Drive bukti unggahan Instagram
                        Story
                        mengenai kisah dari suatu tempat/barang/makanan yang berarti bagi peserta tentang kebudayaan
                        atau
                        hal-hal yang berbau tradisional ataupun sejarah di Surabaya sebagai syarat sahnya pendaftaran
                        pengabdian
                        masyarakat tersebut.
                    </li>
                    <li>
                        Pastikan peserta sudah memiliki Kartu Tanda Mahasiswa (KTM). Jika tidak memiliki KTM, sebagai
                        gantinya
                        peserta dapat melampirkan KRS pada semester yang sedang berjalan.
                    </li>
                </ol>
            </div>
            <div class="card">
                <div class="card-body">
                    <h3>Tentukan jumlah anggota</h3>
                    <label for="memberCount"
                           class="col-md-4 col-form-label text-md-right">Jumlah anggota tim</label>
                    <div class="col">
                        <select id="teamMemberCount" wire:model.lazy="teamMemberCount" name="teamMemberCount"
                                class="form-control @error('teamMemberCount') is-invalid @enderror" required>
                            <option value="1">1 Anggota</option>
                            <option value="4">4 Anggota</option>
                            <option value="5">5 Anggota</option>
                        </select>

                        @error('teamMemberCount')
                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            @break

            @case(2)
            <div class="d-grid gap-3">
                <div class="card">
                    <div class="card-body">
                        <h3>{{$teamMemberCount > 1 ? 'Data anggota tim' : 'Data peserta lomba'}}</h3>
                        @if($teamMemberCount > 1)
                            <p>1 tim {{$teamMemberCount}} anggota</p>
                        @else
                            <p>Silakan lengkapi data dibawah</p>
                        @endif
                    </div>
                </div>
                @foreach(range(1, $teamMemberCount) as $mc)
                    <div class="card">
                        <div class="card-header">
                            <h3>{{$teamMemberCount > 1 ? "Informasi anggota {$mc}" : "Informasi peserta"}}</h3>
                        </div>
                        <div class="card-body">
                            <div class="d-grid gap-4">
                                <div class="form-group">
                                    <label for="names.{{$mc - 1}}"
                                           class="col-md-4 col-form-label text-md-right">Nama lengkap
                                        {{$teamMemberCount > 1 ? " anggota {$mc}" : " peserta"}}
                                    </label>

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
                                    <label for="universities.{{$mc - 1}}"
                                           class="col-md-4 col-form-label text-md-right">Asal universitas
                                        {{$teamMemberCount > 1 ? " anggota {$mc}" : " peserta"}}
                                    </label>

                                    <div class="col">
                                        <div class="d-grid gap-2">
                                            <select id="universities.{{$mc - 1}}"
                                                    wire:model.lazy="universities.{{$mc - 1}}"
                                                    name="universities.{{$mc - 1}}"
                                                    class="form-control @error('universities') is-invalid @enderror"
                                                    required>
                                                <option value="Universitas Kristen Petra">Universitas Kristen Petra
                                                </option>
                                                <option value="Universitas Surabaya">Universitas Surabaya</option>
                                                <option value="Universitas Ciputra">Universitas Ciputra</option>
                                                <option value="Universitas Katolik Widya Mandala">Universitas Katolik
                                                    Widya Mandala
                                                </option>
                                                <option value="OTHER">Universitas lain (Input nama)</option>
                                            </select>

                                            @if(optional($universities)[$mc - 1] === "OTHER")
                                                <div>
                                                    <label for="otherUniversities.{{$mc - 1}}"
                                                           class="col-md-4 col-form-label text-md-right">
                                                        Universitas lain
                                                    </label>
                                                    <input id="otherUniversities.{{$mc - 1}}" type="text"
                                                           placeholder="Ketik nama universitas anda disini"
                                                           class="form-control @error('otherUniversities' . ($mc - 1)) is-invalid @enderror"
                                                           name="otherUniversities.{{$mc - 1}}"
                                                           wire:model.lazy="otherUniversities.{{$mc - 1}}">
                                                </div>
                                            @endif
                                        </div>

                                        @error('otherUniversities' . ($mc - 1))
                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="identifications.{{$mc - 1}}"
                                           class="col-md-4 col-form-label text-md-right">NRP / NIM
                                        {{$teamMemberCount > 1 ? " anggota {$mc}" : " peserta"}}
                                    </label>
                                    <input id="identifications.{{$mc - 1}}" type="text"
                                           placeholder="Ketik nama universitas anda disini"
                                           class="form-control @error('identifications' . ($mc - 1)) is-invalid @enderror"
                                           name="identifications.{{$mc - 1}}"
                                           wire:model.lazy="identifications.{{$mc - 1}}">
                                </div>

                                <div class="form-group">
                                    <label for="line_ids.{{$mc - 1}}"
                                           class="col-md-4 col-form-label text-md-right">ID Line
                                        {{$teamMemberCount > 1 ? " anggota {$mc}" : " peserta"}}
                                    </label>
                                    <input id="line_ids.{{$mc - 1}}" type="text"
                                           placeholder="Ketik nama universitas anda disini"
                                           class="form-control @error('line_ids' . ($mc - 1)) is-invalid @enderror"
                                           name="line_ids.{{$mc - 1}}"
                                           wire:model.lazy="line_ids.{{$mc - 1}}">

                                    @error('line_ids' . ($mc - 1))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="whatsapp_numbers.{{$mc - 1}}"
                                           class="col-md-4 col-form-label text-md-right">Nomor Whatsapp
                                        {{$teamMemberCount > 1 ? " anggota {$mc}" : " peserta"}}
                                    </label>
                                    <input id="whatsapp_numbers.{{$mc - 1}}" type="text"
                                           placeholder="Ketik nama universitas anda disini"
                                           class="form-control @error('line_ids' . ($mc - 1)) is-invalid @enderror"
                                           name="whatsapp_numbers.{{$mc - 1}}"
                                           wire:model.lazy="whatsapp_numbers.{{$mc - 1}}">

                                    @error('whatsapp_numbers' . ($mc - 1))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="instagram_usernames.{{$mc - 1}}"
                                           class="col-md-4 col-form-label text-md-right">Username Instagram
                                        {{$teamMemberCount > 1 ? " anggota {$mc}" : " peserta"}}
                                    </label>
                                    <small class="d-block"><b>Harus menggunakan first account / akun utama</b></small>
                                    <input id="instagram_usernames.{{$mc - 1}}" type="text"
                                           placeholder="Ketik nama universitas anda disini"
                                           class="form-control @error('line_ids' . ($mc - 1)) is-invalid @enderror"
                                           name="instagram_usernames.{{$mc - 1}}"
                                           wire:model.lazy="instagram_usernames.{{$mc - 1}}">

                                    @error('instagram_usernames' . ($mc - 1))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
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
