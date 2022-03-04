<div class="form-width align-self-center">
    <h1 style="font-size: 50px" class="font-weight-bold">VOTE</h1>
    <span class="text-danger mb-1">Teman-teman dapat melakukan sekali voting tiap cabang sayembara. Diharapkan teman-teman dapat melakukan voting sesuai dengan keinginan dan kejujuran teman-teman semuanya, terima kasih 🙏
    </span>
    <br>
    <h3 class="mb-0">Untuk Melihat Karya:</h3>
    <a style="background: #443926; color: white;" class="btn mb-1" href="/Pameranilustrasi" target="_blank">Pameran Desain Ilustrasi</a>
    <a style="background: #443926; color: white;" class="btn mb-1" href="/Pameranfoto" target="_blank">Pameran Human Interest & Street Photography</a>

    <form wire:submit.prevent="vote" class="mt-1">
        @csrf
    <div class="row">
        <div class="col">
          <label for="">Nama Lomba</label>
          <select id="nama-lomba" wire:change="setPesertaLomba" wire:model="idLomba" class="form-select form-select-md mb-3" aria-label=".form-select-lg example">
              <option value="" selected>--Pilih Lomba--</option>
              @foreach ($competitions as $competition)
                  <option value="{{ $competition->id }}">{{ $competition->name }}</option>
              @endforeach
          </select>
          @error('idLomba')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label for="">Peserta</label>
            <select id="peserta-lomba" wire:change="" wire:model="idJoin" class="form-select form-select-md mb-3" aria-label=".form-select-lg example">
            <option value="" selected>--Pilih Peserta--</option>
            @foreach ($participants as $participant)
                <option value="{{ $participant->id }}">@foreach ($participant->names as $name)
                    
                {{ $name }} @if(!$loop->last) {{ ' | ' }} @endif @endforeach</option>
            @endforeach
        </select>
        @error('idJoin')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
    </div>
    <div class="text-center">
        <button type="submit" id="vote-button" class="btn btn-primary shadow-none">Vote!</button>
        <a style="background: #443926; color: white; width: 100%;" class="btn mt-3" href="/">Kembali ke halaman utama</a>
    </div>
    </form>
    
    <div class="d-flex justify-content-center mt-4 d-sm-none">
        <img class="" src="img/auth/epik.png" style="width: 50%" alt="">

    </div>
    
</div>
