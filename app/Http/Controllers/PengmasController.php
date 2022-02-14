<?php

namespace App\Http\Controllers;

use App\Models\SocialMediaMovement;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class PengmasController extends Controller
{
    private function getVerifiedSocialMediaMovement()
    {
        return SocialMediaMovement::where('user_id', auth()->user()->id)
            ->where('verification_status', 'VERIFIED');
    }

    public function index(Request $request): Factory|View|Application
    {
        /*
            canSelectTime
            notRegistered
            unverified
            selectedTime
        */

        $showFormStatus = "canSelectTime";

        if (!SocialMediaMovement::where('user_id', auth()->user()->id)
            ->exists()) {
            $showFormStatus = "notRegistered";
        }

        if (SocialMediaMovement::where('user_id', auth()->user()->id)
            ->where('verification_status', 'UNVERIFIED')
            ->orWhere('verification_status', 'REJECTED')
            ->exists()
        ) {
            $showFormStatus = "unverified";
        }

        if (SocialMediaMovement::where('user_id', auth()->user()->id)
            ->where('verification_status', 'VERIFIED')
            ->whereNotNull('interview_time')
            ->exists()) {
            $showFormStatus = "selectedTime";
        }


        return view('pengmas')->with([
            'showFormStatus' => $showFormStatus
        ]);
    }

    public function store(Request $request): Redirector|Application|RedirectResponse
    {
        $request->validate([
            'delegate_name' => 'required',
            'interview_time' => 'required',
        ]);


        if (!$this->getVerifiedSocialMediaMovement()->exists()) return redirect(route('user-dashboard'))
            ->with('message', [
                'status' => 'danger',
                'message' => 'Anda belum mendaftar social media movement, jadi anda tidak bisa mendaftar pengmas!'
            ]);

        $this->getVerifiedSocialMediaMovement()->update([
            'delegate_name' => $request->input('delegate_name'),
            'interview_time' => Carbon::parse($request->input('interview_time')),
        ]);

        return redirect(route('user-dashboard'))
            ->with('message', [
                'status' => 'success',
                'message' => 'Berhasil memilih jadwal pengmas!'
            ]);
    }
}
