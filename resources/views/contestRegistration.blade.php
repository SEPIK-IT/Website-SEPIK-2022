<x-layout-with-sidebar :title="$competition->title">
    <img src="{{asset('img/header-form-sepik.png')}}" aria-hidden="true" class="img-fluid rounded" />
    <h1 class="my-2">{{$competition->title}}</h1>
    @if($competition->is_opened)
        <livewire:contest-registration :competition="$competition"/>
    @else
        <div class="alert alert-warning" role="alert">
            <h4 class="alert-heading"><b>Pendaftaran sayembara ini sudah ditutup!</b></h4>
            <p>Terimakasih sudah tertarik untuk mendaftar di sayembara ini! Sayang sekali, pendaftaran sudah
                ditutup.</p>
        </div>
    @endif
</x-layout-with-sidebar>
