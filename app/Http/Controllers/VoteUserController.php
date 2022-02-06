<?php

namespace App\Http\Controllers;

use App\Models\FakeCompetitionRegistration;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteUserController extends Controller
{
    public function vote(Request $request) {
        $user_id = Auth::user()->id;
        Vote::create([
            'user_id' => $user_id,
            'fake_competition_registration_id' => $request->idJoin,
            'competition_id' => $request->idLomba,
        ]);
        // add vote_count in fake_competition_registration table
        $fake_competition_registration = FakeCompetitionRegistration::find($request->idJoin);
        $fake_competition_registration->vote_count += 1;
        $fake_competition_registration->save();

    }
}