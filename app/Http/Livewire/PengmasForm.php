<?php

namespace App\Http\Livewire;

use App\Models\SocialMediaMovement;
use App\Models\ZoomSessionCache;
use App\Rules\MaxZoomSession;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class PengmasForm extends Component
{

    public $delegate_name;
    public $interview_time = "2022-02-19 10:00:00";
    public $backup_date = "2022-02-19 10:00:00";
    public $interviewTimeCheckStatus = 0;

    public function render(): Factory|View|Application
    {
        return view('livewire.pengmas-form');
    }

    public function saveData()
    {
        $this->validate([
            'delegate_name' => 'required',
            'interview_time' => ['required', new MaxZoomSession()],
        ]);

        $registrant = SocialMediaMovement::where('user_id', auth()->user()->id)
            ->where('verification_status', 'VERIFIED')
            ->first();

        if (!$registrant->exists()) return redirect(route('user-dashboard'))
            ->with('message', [
                'status' => 'danger',
                'message' => 'Anda belum mendaftar social media movement, jadi anda tidak bisa mendaftar pengmas!'
            ]);


        $registrant->update([
            'delegate_name' => $this->delegate_name,
            'interview_time' => Carbon::parse($this->interview_time),
            'backup_date' => Carbon::parse($this->backup_date)
        ]);

        $this->updateCacheColumn();

        return redirect(route('user-dashboard'))
            ->with('message', [
                'status' => 'success',
                'message' => 'Berhasil memilih jadwal pengmas!'
            ]);
    }

    public function updateCacheColumn()
    {
        ZoomSessionCache::where('session_time', Carbon::parse($this->interview_time))
            ->increment('registrant');
    }

    public function checkAvailability()
    {
        $check = \Validator::make(['interview_time' => $this->interview_time], [
            'interview_time' => ['required', new MaxZoomSession()]
        ]);

        $this->interviewTimeCheckStatus = $check->passes() ? 1 : 2;
    }
}
