<?php

namespace App\Http\Controllers;

use App\Models\CompetitionRegistration;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index(Request $request)
    {

        return view('user-dashboard.index')->with([
            'competitions' => CompetitionRegistration::with('competition')->where('user_id', auth()->user()->id)->get()
        ]);
    }
}
