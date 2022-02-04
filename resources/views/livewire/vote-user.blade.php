<div class="vertical-center form-width">
    <h1 style="font-size: 50px" class="font-weight-bold">VOTE</h1>

    <div class="row">
        <div class="col">
          <label for="">Nama Lomba</label>
          <select id="nama-lomba" wire:change="setPesertaLomba" wire:model="idLomba" class="form-select form-select-md mb-3" aria-label=".form-select-lg example">
              <option value="" selected>--Pilih Lomba--</option>
              @foreach ($competitions as $competition)
                  <option value="{{ $competition->id }}">{{ $competition->name }}</option>
              @endforeach
          </select>
          
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label for="">Peserta</label>
            <select id="peserta-lomba" wire:change="" wire:model="idJoin" class="form-select form-select-md mb-3" aria-label=".form-select-lg example">
            <option value="" selected>--Pilih Peserta--</option>
            @foreach ($participants as $participant)
                <option value="{{ $participant->id }}">{{ $participant->names }}</option>
            @endforeach
        </select>
        </div>
    </div>
    <div class="text-center">
        <button id="vote-button" class="btn btn-primary shadow-none">Vote!</button>

    </div>
</div>
