<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\CompetitionRegistration;
use Illuminate\Http\Request;

class ContestRegistController extends Controller
{
    public function index(Request $request, Competition $competition)
    {
        return view('contestRegistration', [
            'competition' => $competition,
        ]);
    }
}
