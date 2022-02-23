<?php

namespace App\Http\Controllers;

use App\Models\CompetitionRegistration;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteUserController extends Controller
{
    public function vote(Request $request) {
        $user_id = Auth::user()->id;
        Vote::create([
            'user_id' => $user_id,
            'competition_registration_id' => $request->idJoin,
            'competition_id' => $request->idLomba,
        ]);
        // add vote_count in competition_registration table
        $competition_registration = CompetitionRegistration::find($request->idJoin);
        $competition_registration->vote_count += 1;
        $competition_registration->save();

    }
}