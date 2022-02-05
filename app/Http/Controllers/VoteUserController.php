<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteUserController extends Controller
{
    public function vote(Request $request) {
        $user_id = Auth::user()->id;
        Vote::create([
            'id_user_voter' => $user_id,
            'id_join' => $request->idJoin,
        ]);

    }
}