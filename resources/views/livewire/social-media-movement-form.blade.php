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
                                               class="form-control @error('names.' . ($mc - 1)) is-invalid @enderror"
                                               name="names.{{$mc - 1}}" wire:model.lazy="names.{{$mc - 1}}">

                                        @error('names.' . ($mc - 1))
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
                                                    class="form-control @error('universities.' . ($mc - 1)) is-invalid @enderror"
                                                    required>
                                                <option value="Universitas Kristen Petra">Universitas Kristen Petra
                                                </option>
                                                <option value="Universitas Surabaya">Universitas Surabaya</option>
                                                <option value="Universitas Ciputra">Universitas Ciputra</option>
                                                <option value="Universitas Katolik Widya Mandala">Universitas Katolik
                                                    Widya Mandala
                                                </option>
                                            </select>

                                        </div>

                                        @error('universities.' . ($mc - 1))
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
                                    @error('identifications.' . ($mc - 1))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="line_ids.{{$mc - 1}}"
                                           class="col-md-4 col-form-label text-md-right">ID Line
                                        {{$teamMemberCount > 1 ? " anggota {$mc}" : " peserta"}}
                                    </label>
                                    <input id="line_ids.{{$mc - 1}}" type="text"
                                           placeholder="Ketik nama universitas anda disini"
                                           class="form-control @error('line_ids.' . ($mc - 1)) is-invalid @enderror"
                                           name="line_ids.{{$mc - 1}}"
                                           wire:model.lazy="line_ids.{{$mc - 1}}">

                                    @error('line_ids.' . ($mc - 1))
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
                                           class="form-control @error('line_ids.' . ($mc - 1)) is-invalid @enderror"
                                           name="whatsapp_numbers.{{$mc - 1}}"
                                           wire:model.lazy="whatsapp_numbers.{{$mc - 1}}">

                                    @error('whatsapp_numbers.' . ($mc - 1))
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
                                           class="form-control @error('line_ids.' . ($mc - 1)) is-invalid @enderror"
                                           name="instagram_usernames.{{$mc - 1}}"
                                           wire:model.lazy="instagram_usernames.{{$mc - 1}}">

                                    @error('instagram_usernames.' . ($mc - 1))
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

            @case(3)
            <div class="card">
                <div class="card-body">
                    <h3>Pengumpulan Data Anggota Kelompok</h3>
                    <p>Link Google Drive berisi folder unggahan KTM & Foto dari setiap anggota kelompok.</p>

                    <div class="d-grid gap-3">
                        <div class="form-group">
                            <label for="id_proof_link"
                                   class="col-md-4 col-form-label text-md-right">
                                Link Google Drive Upload KTM (Kartu Tanda Mahasiswa)
                            </label>
                            <small class="d-block">
                                Jika tidak memiliki KTM, wajib memperhatikan Booklet Pendaftaran Social Media Movement.
                                Format Pengumpulan adalah: KTM_NamaAnggota. Pastikan opsi link Google Drive telah
                                dirubah menjadi "Anyone with the Link (Viewer)".
                            </small>

                            <input id="id_proof_link" type="text"
                                   class="form-control @error('id_proof_link') is-invalid @enderror"
                                   name="id_proof_link"
                                   required
                                   wire:model.lazy="id_proof_link">

                            @error('id_proof_link')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="photo_link"
                                   class="col-md-4 col-form-label text-md-right">
                                Link Google Drive Upload Foto 3x4 dengan Background Polos
                            </label>
                            <small class="d-block">
                                Format Pengumpulan adalah: FOTO_NamaAnggota. Pastikan opsi link Google Drive telah
                                dirubah menjadi "Anyone with the Link (Viewer)".
                            </small>

                            <input id="photo_link" type="text"
                                   class="form-control @error('photo_link') is-invalid @enderror"
                                   name="photo_link"
                                   required
                                   wire:model.lazy="photo_link">

                            @error('photo_link')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            @break

            @case(4)
            <div class="card">
                <div class="card-body">
                    <h3>Pembayaran Biaya Pendaftaran</h3>
                    <p>Dimohon untuk mentransfer biaya kegiatan minimal sebesar Rp. 50.008 / orang ke No. rek BCA:
                        0101920231 a/n Michael Angelo Kamaluddin dengan berita acara : Nama(NRP/NIM)</p>

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
                            <label for="transfer_proof"
                                   class="col-md-4 col-form-label text-md-right">Foto bukti
                                pembayaran</label>

                            <div class="col">
                                <input id="transfer_proof" type="file"
                                       class="form-control @error('transfer_proof') is-invalid @enderror"
                                       name="transfer_proof"
                                       required
                                       wire:model.lazy="transfer_proof">

                                @error('transfer_proof')
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
                    <h3>Pengumpulan Bukti Unggahan</h3>
                    <p>Link Google Drive berisi kumpulan bukti unggahan dari setiap anggota kelompok yang telah
                        dijelaskan pada Booklet Pendaftaran Social Media Movement. </p>

                    <div class="d-grid gap-3">
                        <div class="form-group">
                            <label for="story_proof_link"
                                   class="col-md-4 col-form-label text-md-right">
                                Link Google Drive Bukti Pengumpulan Screenshot Instagram Story
                            </label>
                            <small class="d-block">
                                Peserta WAJIB melampirkan Link Google Drive yang berisi BUKTI unggahan IG Story mengenai
                                kisah dari suatu tempat/barang/makanan yang berarti bagi peserta tentang kebudayaan atau
                                hal-hal berbau tradisional maupun sejarah di Surabaya. Pastikan opsi link Google Drive
                                telah dirubah menjadi "Anyone with the Link (Viewer)".
                            </small>

                            <input id="story_proof_link" type="text"
                                   class="form-control @error('story_proof_link') is-invalid @enderror"
                                   name="story_proof_link"
                                   required
                                   wire:model.lazy="story_proof_link">

                            @error('story_proof_link')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="file_proof_link"
                                   class="col-md-4 col-form-label text-md-right">
                                Link Google Drive Pengumpulan File Video/Foto Instagram Story
                            </label>
                            <small class="d-block">
                                Peserta WAJIB melampirkan Link Google Drive yang berisi foto/video yang diunggah di IG
                                Story mengenai kisah dari suatu tempat,barang,makanan yang berarti bagi peserta tentang
                                kebudayaan atau hal-hal berbau tradisional maupun sejarah di Surabaya. Pastikan opsi
                                link Google Drive telah dirubah menjadi "Anyone with the Link (Viewer)".
                            </small>

                            <input id="file_proof_link" type="text"
                                   class="form-control @error('file_proof_link') is-invalid @enderror"
                                   name="file_proof_link"
                                   required
                                   wire:model.lazy="file_proof_link">

                            @error('file_proof_link')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="twibbon_proof_link"
                                   class="col-md-4 col-form-label text-md-right">
                                Link Instagram Bukti Upload Twibbon
                            </label>
                            <small class="d-block">
                                Peserta WAJIB melampirkan Link Instagram yang berisi unggahan twibbon di Instagram
                                pribadi (wajib akun pertama/first account) dan dilarang memprivate akun. Postingan
                                twibbon dapat di keep hingga 12 Maret 2022.
                            </small>

                            <input id="twibbon_proof_link" type="text"
                                   class="form-control @error('twibbon_proof_link') is-invalid @enderror"
                                   name="twibbon_proof_link"
                                   required
                                   wire:model.lazy="twibbon_proof_link">

                            @error('twibbon_proof_link')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            @break

            @case(6)
            <div class="card">
                <div class="card-body">
                    <h3>MATUR NUWUN, REK !</h3>
                    <p>
                        Terima kasih sudah melakukan pendaftaran Social Media Movement SEPIK 2022! <br>
                        Untuk informasi yang berkaitan dengan kegiatan ini, peserta dapat bergabung dalam Grup Line
                        melalui link:
                        <br>
                        <a href="https://line.me/ti/g2/PDH1E_d9QvrYlPKRxJjfPBhBi2SHnBw-WpATWA?utm_source=invitation&utm_medium=link_copy&utm_campaign=default">https://line.me/ti/g2/PDH1E_d9QvrYlPKRxJjfPBhBi2SHnBw-WpATWA?utm_source=invitation&utm_medium=link_copy&utm_campaign=default</a>

                        Surabaya Epik 2022, <br>
                        Mangun Karsa Kalih Rasa!
                    </p>
                </div>
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
