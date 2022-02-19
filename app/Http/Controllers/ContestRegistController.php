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

    public function submitWorks(Request $request, Competition $competition)
    {
        return view('submit-sayembara', [
            'competition' => $competition,
            'check_if_registered' => CompetitionRegistration::where('user_id', auth()->user()->id)->first()
        ]);
    }

    public function updateWorks(Request $request, Competition $competition)
    {
        $folderFormat = $request->competition_id . "-" . auth()->user()->id;
        $this->validate($request, [
            'google_drive_link' => 'required',
            'caption' => ['required', 'max:5120', 'mimes:pdf'],
            'originality_statement' => ['required', 'max:5120', 'mimes:pdf'],
        ]);
        $submit = CompetitionRegistration::where('user_id', auth()->user()->id);
        $submit->update([
            'google_drive_link' => $request->google_drive_link,
            'caption' => $request->caption->storeAs("captions/{$folderFormat}", $request->caption->getClientOriginalName(), 'private'),
            'originality_statement' => $request->originality_statement->storeAs("statements/{$folderFormat}", $request->originality_statement->getClientOriginalName(), 'private'),
            'verification_status' => 'UNVERIFIED'
        ]);
        return redirect(route('terima-kasih-submisi-karya'));
    }
}
