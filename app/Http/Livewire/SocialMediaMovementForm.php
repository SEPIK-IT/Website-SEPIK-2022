<?php

namespace App\Http\Livewire;

use Illuminate\Validation\Rule;
use Livewire\Component;

class SocialMediaMovementForm extends Component
{
    public $currentStep = 1;
    public bool $canContinue = true;
    public $teamMemberCount = 1;

    public $names = [];
    public $universities = [
        'Universitas Kristen Petra',
        'Universitas Kristen Petra',
        'Universitas Kristen Petra',
        'Universitas Kristen Petra',
        'Universitas Kristen Petra'
    ];
    public $otherUniversities = ['', '', '', '', ''];
    public $identifications;
    public $line_ids;
    public $whatsapp_numbers;
    public $instagram_usernames;


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
                    'names.1' => ['required'],
                    'names.2' => [Rule::requiredIf(fn() => $this->teamMemberCount == 4 || $this->teamMemberCount == 5)],
                    'names.3' => [Rule::requiredIf(fn() => $this->teamMemberCount == 4 || $this->teamMemberCount == 5)],
                    'names.4' => [Rule::requiredIf(fn() => $this->teamMemberCount == 4 || $this->teamMemberCount == 5)],
                    'names.5' => [Rule::requiredIf(fn() => $this->teamMemberCount == 4 || $this->teamMemberCount == 5)],

                    // TODO: add check for UC/UKP/WM/UBAYA
                    'universities.1' => ['required'],
                    'universities.2' => [Rule::requiredIf(fn() => $this->teamMemberCount == 4 || $this->teamMemberCount == 5)],
                    'universities.3' => [Rule::requiredIf(fn() => $this->teamMemberCount == 4 || $this->teamMemberCount == 5)],
                    'universities.4' => [Rule::requiredIf(fn() => $this->teamMemberCount == 4 || $this->teamMemberCount == 5)],
                    'universities.5' => [Rule::requiredIf(fn() => $this->teamMemberCount == 4 || $this->teamMemberCount == 5)],



                ]);
                break;
        }
    }

    public function mergeUniversities(): array
    {
        $mergedArray = [];

        foreach ($this->names as $nameKey => $name) {
            $mergedArray[$nameKey] = $this->universities[$nameKey] === 'OTHER'
                ? $this->otherUniversities[$nameKey]
                : $this->universities[$nameKey];
        }

        return $mergedArray;
    }
}
