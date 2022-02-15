<div>
    <form wire:submit.prevent="saveData">
        <div class="d-grid gap-3">
            <x-input wire:model.lazy="delegate_name" name="delegate_name" label="Nama perwakilan anggota kelompok"
                     required/>
            <p>Tuliskan nama ketua kelompok sesuai saat pendaftaran (ketua kelompok adalah orang pertama)</p>
            <x-select wire:model.lazy="interview_time" name="interview_time" label="Jadwal interview" required>
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

            <button type="button" wire:click.prevent="checkAvailability" class="btn btn-submit my-2">Cek jadwal</button>

            @switch($interviewTimeCheckStatus)

                @case(1)
                <div class="alert alert-success">Anda bisa memilih jadwal ini! <b>Pastikan segera melakukan submisi form ini agar mendapatkan kuota jadwal ini.</b></div>
                @break

                @case(2)
                <div class="alert alert-danger">Jadwal sudah penuh!</div>
                @break

                @default
                @break

            @endswitch


        </div>

        <button type="submit" class="btn btn-submit my-2">Ajukan jadwal</button>
    </form>
</div>
