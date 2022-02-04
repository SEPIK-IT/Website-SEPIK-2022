<?php

namespace App\Http\Livewire;

use App\Models\Competition;
use App\Models\CompetitionRegistration;
use App\Models\FakeCompetitionRegistration;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class VoteUser extends Component
{
    public $idLomba = '';
    public $idJoin = '';
    public function setPesertaLomba() {
        $this->idJoin = '';
    }
    public function render()
    {
        return view('livewire.vote-user', [
            'competitions' => Competition::all(),
            'participants' => FakeCompetitionRegistration::where('competition_id', $this->idLomba)->get(),
        ]);
    }
}