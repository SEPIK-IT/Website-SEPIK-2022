<?php

namespace App\Http\Livewire;

use App\Models\SocialMediaMovement;
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

    public $id_proof_link;
    public $photo_link;
    public $transfer_proof;
    public $story_proof_link;
    public $file_proof_link;
    public $twibbon_proof_link;


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
                    'transfer_proof' => ['required', 'image', 'max:5120']
                ]);
                $this->currentStep = 5;
                break;
            case 5:
                $this->validate([
                    'story_proof_link' => ['required'],
                    'file_proof_link' => ['required'],
                    'twibbon_proof_link' => ['required'],
                ]);
                $this->saveAllInput();
                break;
        }
    }

    public function saveAllInput()
    {
        SocialMediaMovement::create([
            'user_id' => auth()->user()->id,
            'universities' => $this->assignUniversities(),
            'names' => $this->names,
            'transfer_proof' => $this->transfer_proof->store("social-media-movement/transfer-proof", 'private'),
            'whatsapp_numbers' => $this->whatsapp_numbers,
            'photo_link' => $this->photo_link,
            'instagram_usernames' => $this->instagram_usernames,
            'story_proof_link' => $this->story_proof_link,
            'line_ids' => $this->line_ids,
            'file_proof_link' => $this->file_proof_link,
            'twibbon_proof_link' => $this->twibbon_proof_link,
            'id_proof_link' => $this->id_proof_link,
            'identifications' => $this->identifications,
        ]);
        $this->currentStep = 6;
        $this->canContinue = false;
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
