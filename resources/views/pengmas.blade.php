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
                <livewire:pengmas-form />
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
                <p>Anda sudah memilih jam interview pengmas. <a href="{{route('social-media-movement.pengmas.index')}}?update=1">Klik untuk mengupdate jadwal</a></p>
            </div>
        </div>
        @break
    @endswitch
</x-layout-with-sidebar>
