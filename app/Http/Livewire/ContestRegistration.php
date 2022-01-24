<?php

namespace App\Http\Livewire;

use App\Models\Competition;
use App\Models\CompetitionRegistration;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class ContestRegistration extends Component
{
    use WithFileUploads;

    public Competition $competition;

    public array $names;
    public int $nominal;
    public string $university;
    public string $category = "mahasiswa";
    public string $google_drive_link;
    public string $proof;

    public bool $thankyou = false;

    public function mount()
    {
        $this->names = [
            auth()->user()->name,
        ];

        $this->nominal = $this->competition->nominal;
    }

    public function render()
    {
        return view('livewire.contest-registration');
    }

    public function submit()
    {
        $this->validate([
            // 'names.1' => Rule::requiredIf(function () {
            //     return $this->competition->multiple_registration;
            // }),
            'university' => Rule::requiredIf(function () {
                return $this->category === "mahasiswa";
            }),
            'names.0' => 'required',
            'google_drive_link' => 'required',
            'nominal' => ['required', 'numeric'],
            'category' => 'required',
            'proof' => ['required', 'image', 'max:5120']
        ]);

        $names = collect($this->names)->filter()->toArray();
        $proof = $this->proof->store('bukti_transfer', 'public');

        CompetitionRegistration::create([
            'user_id' => auth()->user()->id,
            'competition_id' => $this->competition->id,
            'names' => $names,
            'nominal' => $this->competition->nominal,
            'category' => $this->category == "mahasiswa" ? "MAHASISWA" : "UMUM",
            'google_drive_link' => $this->google_drive_link,
            'university' => $this->university ?? "",
            'transfer_proof' => $proof,
        ]);

        $this->thankyou = true;
    }
}
