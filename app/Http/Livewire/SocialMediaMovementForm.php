<?php

namespace App\Http\Livewire;

use App\Models\SocialMediaMovement;
use App\Models\UniversityCache;
use App\Rules\CheckMaxUniversity;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class SocialMediaMovementForm extends Component
{
    use WithFileUploads;

    public $currentStep = 1;
    public bool $canContinue = true;
    public $teamMemberCount = 1;

    public $names = [];
    public $universities = [
        'Universitas Kristen Petra',
        'Universitas Kristen Petra',
        'Universitas Kristen Petra',
        'Universitas Kristen Petra',
        'Universitas Kristen Petra',

    ];
    public $identifications;
    public $line_ids;
    public $whatsapp_numbers;
    public $instagram_usernames;
    public $twibbon_links;

    public $id_proof_link;
    public $photo_link;
    public $transfer_proof;
    public $story_proof_link;
    public $file_proof_link;


    public function render()
    {
        return view('livewire.social-media-movement-form');
    }

    public function verifyAndNextStep()
    {
        switch ($this->currentStep) {
            case 1:
                $this->validate([
                    'teamMemberCount' => ['required', 'lte:5', 'gte:1']
                ]);
                $this->currentStep = 2;
                break;

            case 2:
                $this->validate([
                    'names.0' => ['required'],
                    'names.1' => [Rule::requiredIf(fn() => $this->teamMemberCount == 4 || $this->teamMemberCount == 5)],
                    'names.2' => [Rule::requiredIf(fn() => $this->teamMemberCount == 4 || $this->teamMemberCount == 5)],
                    'names.3' => [Rule::requiredIf(fn() => $this->teamMemberCount == 4 || $this->teamMemberCount == 5)],
                    'names.4' => [Rule::requiredIf(fn() => $this->teamMemberCount == 5)],

                    'universities.0' => ['required', new CheckMaxUniversity],
                    'universities.1' => [Rule::requiredIf(fn() => $this->teamMemberCount == 4 || $this->teamMemberCount == 5), new CheckMaxUniversity],
                    'universities.2' => [Rule::requiredIf(fn() => $this->teamMemberCount == 4 || $this->teamMemberCount == 5), new CheckMaxUniversity],
                    'universities.3' => [Rule::requiredIf(fn() => $this->teamMemberCount == 4 || $this->teamMemberCount == 5), new CheckMaxUniversity],
                    'universities.4' => [Rule::requiredIf(fn() => $this->teamMemberCount == 5), new CheckMaxUniversity],

                    'line_ids.0' => ['required'],
                    'line_ids.1' => [Rule::requiredIf(fn() => $this->teamMemberCount == 4 || $this->teamMemberCount == 5)],
                    'line_ids.2' => [Rule::requiredIf(fn() => $this->teamMemberCount == 4 || $this->teamMemberCount == 5)],
                    'line_ids.3' => [Rule::requiredIf(fn() => $this->teamMemberCount == 4 || $this->teamMemberCount == 5)],
                    'line_ids.4' => [Rule::requiredIf(fn() => $this->teamMemberCount == 5)],

                    'whatsapp_numbers.0' => ['required'],
                    'whatsapp_numbers.1' => [Rule::requiredIf(fn() => $this->teamMemberCount == 4 || $this->teamMemberCount == 5)],
                    'whatsapp_numbers.2' => [Rule::requiredIf(fn() => $this->teamMemberCount == 4 || $this->teamMemberCount == 5)],
                    'whatsapp_numbers.3' => [Rule::requiredIf(fn() => $this->teamMemberCount == 4 || $this->teamMemberCount == 5)],
                    'whatsapp_numbers.4' => [Rule::requiredIf(fn() => $this->teamMemberCount == 5)],

                    'instagram_usernames.0' => ['required'],
                    'instagram_usernames.1' => [Rule::requiredIf(fn() => $this->teamMemberCount == 4 || $this->teamMemberCount == 5)],
                    'instagram_usernames.2' => [Rule::requiredIf(fn() => $this->teamMemberCount == 4 || $this->teamMemberCount == 5)],
                    'instagram_usernames.3' => [Rule::requiredIf(fn() => $this->teamMemberCount == 4 || $this->teamMemberCount == 5)],
                    'instagram_usernames.4' => [Rule::requiredIf(fn() => $this->teamMemberCount == 5)],

                    'twibbon_links.0' => ['required'],
                    'twibbon_links.1' => [Rule::requiredIf(fn() => $this->teamMemberCount == 4 || $this->teamMemberCount == 5)],
                    'twibbon_links.2' => [Rule::requiredIf(fn() => $this->teamMemberCount == 4 || $this->teamMemberCount == 5)],
                    'twibbon_links.3' => [Rule::requiredIf(fn() => $this->teamMemberCount == 4 || $this->teamMemberCount == 5)],
                    'twibbon_links.4' => [Rule::requiredIf(fn() => $this->teamMemberCount == 5)],
                ]);

                $this->currentStep = 3;
                break;

            case 3:
                $this->validate([
                    'id_proof_link' => ['required'],
                    'photo_link' => ['required'],
                ]);
                $this->currentStep = 4;
                break;
            case 4:
                $this->validate([
                    'transfer_proof' => ['required']
                ]);
                $this->currentStep = 5;
                break;
            case 5:
                $this->validate([
                    'story_proof_link' => ['required'],
                    'file_proof_link' => ['required'],
                ]);
                $this->saveAllInput();
                break;
        }
    }

    public function saveAllInput()
    {
        SocialMediaMovement::create([
            'user_id' => auth()->user()->id,
            'verification_status' => 'UNVERIFIED',
            'universities' => $this->assignUniversities(),
            'twibbon_links' => $this->twibbon_links,
            'names' => $this->names,
            'transfer_proof' => $this->transfer_proof,
            'whatsapp_numbers' => $this->whatsapp_numbers,
            'photo_link' => $this->photo_link,
            'instagram_usernames' => $this->instagram_usernames,
            'story_proof_link' => $this->story_proof_link,
            'line_ids' => $this->line_ids,
            'file_proof_link' => $this->file_proof_link,
            'id_proof_link' => $this->id_proof_link,
            'identifications' => $this->identifications,
            'member_counts' => count($this->names)
        ]);

        $this->updateUniversities();

        $this->currentStep = 6;
        $this->canContinue = false;
    }

    public function updateUniversities()
    {
        foreach ($this->names as $key => $name){
           UniversityCache::where('name', $this->universities[$key])->first()->increment('registrant');
        }
    }

    public function assignUniversities(): array
    {
        $data = [];

        foreach ($this->names as $key => $name) {
            $data[$key] = $this->universities[$key];
        }

        return $data;
    }
}
