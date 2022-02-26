<x-layout-with-sidebar :title="$competition->title">
    @if(isset($check_if_registered->id))
    <h1>{{ $competition->title }}</h1>
    <h3 class="mt-4">Kumpulkan karya anda!</h3>
    <a class="btn btn-sepik" href="/user-dashboard">Kembali ke Dashboard Pengguna</a>
    <div class="card mt-4">
        <div class="card-body">
            <form action="{{ route('update-works') }}" method="post" enctype="multipart/form-data">
                @csrf
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
                <input type="hidden" name="competition_id" value="{{ $competition->id }}"/>
                <button type="submit" class="btn btn-sepik">Kumpulkan karya</button>
            </div>

        </div>
    </div>
    @else
    <div class="alert alert-warning">
        <h3>Anda tidak diizinkan untuk memasuki laman ini.</h3>
        <div class="alert alert-danger">
            <p>Silahkan kembali ke halaman dashboard.</p>
        </div>
        <a class="btn btn-sepik" href="/user-dashboard">Kembali ke Dashboard Pengguna</a>
    </div>
    @endif
</x-layout-with-sidebar>