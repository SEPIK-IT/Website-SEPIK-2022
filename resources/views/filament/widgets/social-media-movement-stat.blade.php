<x-filament::widget>
    <x-filament::card>
        <div class="text-sm font-medium text-gray-500">
            Statistik Social Media Movement
        </div>
       <ul wire:poll.keep-alive.60000ms="">
           @foreach(\App\Models\UniversityCache::all() as $universityCache)
               <li>{{$universityCache->name}} - {{$universityCache->registrant}} peserta</li>
           @endforeach
       </ul>
        <div class="text-xs font-medium text-gray-500">
            Diupdate setiap 1 menit
        </div>
    </x-filament::card>
</x-filament::widget>
