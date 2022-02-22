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
        $vote_status = Competition::where('id', $this->idLomba)->first()->vote_status;

        if (!$vote_status) {
            $this->emit('voteClosed');
        } else {
            $user_id = Auth::user()->id;
            //cek apakah sudah pernah vote
            $sudahVote = Vote::where('votes.user_id', $user_id)->where('competition_id', $this->idLomba)->first();
            //insert to table vote
            if (!$sudahVote){
                //confirmation
                $this->emit('confirmVote');
            } else {
                $this->emit('voteFailed');
            }
        }

        
    }

    public function render()
    {
        return view('livewire.vote-user', [
            //competitions order by name

            'competitions' => Competition::where('vote_status', '=', '1')->orderBy('name')->get(),
            'participants' => FakeCompetitionRegistration::where('competition_id', $this->idLomba)->get(),
        ]);
    }
}