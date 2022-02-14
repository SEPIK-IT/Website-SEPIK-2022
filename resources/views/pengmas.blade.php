<x-layout-with-sidebar title="Pengabdian Masyarakat - Surabaya Epik 2022">
    @switch($showFormStatus)
        @case('canSelectTime')
        <div class="card my-2">
            <div class="card-body">
                <h3>
                    Pemilihan Jadwal Social Media Movement (Pengmas)
                </h3>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{route('social-media-movement.pengmas.store')}}" method="POST">
                    <div class="d-grid gap-3">
                        <x-input name="delegate_name" label="Nama perwakilan anggota kelompok" required/>
                        <x-select name="interview_time" label="Jadwal interview" required>
                            <x-slot name="options">
                                <option selected value="2022-02-19 10:00:00">Sabtu, 19 Februari 2022 (Sesi 1 | 10.00 -
                                    12.00 WIB)
                                </option>
                                <option value="2022-02-19 17:00:00">Sabtu, 19 Februari 2022 (Sesi 2 | 17.00 - 19.00 WIB)
                                </option>
                                <option value="2022-02-20 10:00:00">Minggu, 20 Februari 2022 (Sesi 1 | 10.00 - 12.00
                                    WIB)
                                </option>
                                <option value="2022-02-20 17:00:00">Minggu, 20 Februari 2022 (Sesi 2 | 17.00 - 19.00
                                    WIB)
                                </option>
                                <option value="2022-02-21 18:00:00">Senin, 21 Februari 2022 (18.00 - 20.00 WIB)</option>
                            </x-slot>
                        </x-select>
                        @csrf
                    </div>

                    <button class="btn btn-submit my-2">Ajukan jadwal</button>
                </form>
            </div>
        </div>
        @break

        @case('notRegistered')
        <div class="card my-2">
            <div class="card-body">
                <h3>
                    Pemilihan Jadwal Social Media Movement (Pengmas)
                </h3>
                <p>Mohon maaf, anda belum mendaftarkan diri ke Social Media Movement. Sehingga anda tidak bisa memilih
                    jadwal Pengmas</p>
            </div>
        </div>
        @break

        @case('unverified')
        <div class="card my-2">
            <div class="card-body">
                <h3>
                    Pemilihan Jadwal Social Media Movement (Pengmas)
                </h3>
                <p>Mohon maaf, pendaftaran anda belum diverifikasi. Sehingga anda tidak bisa memilih
                    jadwal Pengmas</p>
            </div>
        </div>
        @break

        @case('selectedTime')
        <div class="card my-2">
            <div class="card-body">
                <h3>
                    Pemilihan Jadwal Social Media Movement (Pengmas)
                </h3>
                <p>Anda sudah memilih jam interview pengmas.</p>
            </div>
        </div>
        @break
    @endswitch
</x-layout-with-sidebar>
