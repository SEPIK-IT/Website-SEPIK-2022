<?php

namespace App\Http\Livewire;

use App\Models\Competition;
use App\Models\CompetitionRegistration;
use App\Models\FakeCompetitionRegistration;
use App\Models\Vote;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class VoteUser extends Component
{
    public $idLomba = '';
    public $idJoin = '';

    public function setPesertaLomba() {
        $this->idJoin = '';
    }
    public function vote() {
        $this->validate([
            'idLomba' => 'required',
            'idJoin' => 'required',
        ], [
            'idLomba.required' => 'Pilih lomba yang ingin di vote',
            'idJoin.required' => 'Pilih peserta yang ingin di vote',
        ]);
        //custom message

        $user_id = Auth::user()->id;

        //cek apakah sudah pernah vote
        $sudahVote = Vote::join('fake_competition_registrations', 'fake_competition_registrations.id', '=', 'votes.id_join')
            ->where('votes.id_user_voter', $user_id)
            ->where('fake_competition_registrations.competition_id', $this->idLomba)
            ->first();
        //insert to table vote
        if (!$sudahVote){
            //confirmation
            $this->emit('confirmVote');
            
        } else {
            $this->emit('voteFailed');
        }
        
    }

    public function render()
    {
        return view('livewire.vote-user', [
            'competitions' => Competition::all(),
            'participants' => FakeCompetitionRegistration::where('competition_id', $this->idLomba)->get(),
        ]);
    }
}