<?php

namespace App\Http\Livewire;

use App\Models\Competition;
use App\Models\CompetitionRegistration;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class ContestRegistrationMultiple extends Component
{
    use WithFileUploads;

    public Competition $competition;


    public int $steps = 1;
    public $memberCount = 1;

    public bool $canContinue = true;


    // Informasi setiap peserta
    public $names;
    public $identifications;
    public $origins;
    public $regions;
    public $upload_ids;
    public $upload_photos;
    public $twibbon_links;

    // Pengumpulan karya
    public $google_drive_link;
    public $caption;
    public $originality_statement;

    // Contact person
    public $whatsapp_no;
    public $line_id;

    // Bukti pembayaran
    public $payment_proof;


    public function mount()
    {
        if (!$this->competition->multiple_registration) {
            $this->steps = 2;
        }

        $this->whatsapp_no = auth()->user()->phone;
        $this->line_id = auth()->user()->line_id;
    }

    public function render()
    {

        return view('livewire.contest-registration-multiple');
    }

    public function verifyAndNextStep()
    {

        switch ($this->steps) {
            case 1:
                $this->validate([
                    'memberCount' => ['required', 'min:1', 'max:3']
                ]);

                $this->steps = 2;
                break;

            case 2:
                $this->validate([
                    'names.0' => ['required'],
                    'names.1' => Rule::requiredIf(fn() => $this->competition->multiple_registration && $this->memberCount === 2),
                    'names.2' => Rule::requiredIf(fn() => $this->competition->multiple_registration && $this->memberCount === 3),

                    'identifications.0' => ['required'],
                    'identifications.1' => Rule::requiredIf(fn() => $this->competition->multiple_registration && $this->memberCount === 2),
                    'identifications.2' => Rule::requiredIf(fn() => $this->competition->multiple_registration && $this->memberCount === 3),

                    'origins.0' => ['required'],
                    'origins.1' => Rule::requiredIf(fn() => $this->competition->multiple_registration && $this->memberCount === 2),
                    'origins.2' => Rule::requiredIf(fn() => $this->competition->multiple_registration && $this->memberCount === 3),

                    'regions.0' => ['required'],
                    'regions.1' => Rule::requiredIf(fn() => $this->competition->multiple_registration && $this->memberCount === 2),
                    'regions.2' => Rule::requiredIf(fn() => $this->competition->multiple_registration && $this->memberCount === 3),

                    'upload_ids.0' => ['required', 'image', 'max:5120'],
                    'upload_ids.1' => [Rule::requiredIf(fn() => $this->competition->multiple_registration && $this->memberCount === 2), 'image', 'max:5120'],
                    'upload_ids.2' => [Rule::requiredIf(fn() => $this->competition->multiple_registration && $this->memberCount === 3), 'image', 'max:5120'],

                    'upload_photos.0' => ['required', 'image', 'max:5120'],
                    'upload_photos.1' => [Rule::requiredIf(fn() => $this->competition->multiple_registration && $this->memberCount === 2), 'image', 'max:5120'],
                    'upload_photos.2' => [Rule::requiredIf(fn() => $this->competition->multiple_registration && $this->memberCount === 3), 'image', 'max:5120'],

                    'twibbon_links.0' => ['required'],
                    'twibbon_links.1' => Rule::requiredIf(fn() => $this->competition->multiple_registration && $this->memberCount === 2),
                    'twibbon_links.2' => Rule::requiredIf(fn() => $this->competition->multiple_registration && $this->memberCount === 3),
                ]);

                $this->steps = 3;
                break;

            case 3:
                $this->validate([
                    'google_drive_link' => 'required',
                    'caption' => ['required', 'max:5120', 'mimes:pdf'],
                    'originality_statement' => ['required', 'max:5120', 'mimes:pdf'],
                ]);
                $this->steps = 4;
                break;

            case 4:
                $this->validate([
                    'whatsapp_no' => ['required'],
                    'line_id' => ['required'],
                ]);
                $this->steps = 5;
                break;

            case 5:
                $this->validate([
                    'payment_proof' => ['required', 'image', 'max:5120']
                ]);


                $this->saveAllData();

                $this->steps = 6;
                $this->canContinue = false;
                break;
        }
    }

    public function saveAllData()
    {
        $folderFormat = $this->competition->id . "-" . auth()->user()->id;

        $idfiles = [];
        $photosfile = [];

        foreach ($this->upload_ids as $id_file) {
            $idfiles[] = $id_file->storeAs("id-cards/{$folderFormat}", $id_file->getClientOriginalName(), "private");
        }

        foreach ($this->upload_photos as $photos) {
            $photosfile[] = $photos->storeAs("participant-photos/{$folderFormat}", $photos->getClientOriginalName(), "private");
        }


        CompetitionRegistration::create([
            'names' => $this->names,
            'identifications' => $this->identifications,
            'origins' => $this->origins,
            'regions' => $this->regions,
            'upload_ids' => $idfiles,
            'upload_photos' => $photosfile,
            'twibbon_links' => $this->twibbon_links,
            'google_drive_link' => $this->google_drive_link,
            'caption' => $this->caption->storeAs("captions/{$folderFormat}", $this->caption->getClientOriginalName(), 'private'),
            'originality_statement' => $this->originality_statement->storeAs("statements/{$folderFormat}", $this->originality_statement->getClientOriginalName(), 'private'),
            'whatsapp_no' => $this->whatsapp_no,
            'line_id' => $this->line_id,
            'payment_proof' => $this->payment_proof->storeAs("payment-proofs/{$folderFormat}", $this->caption->getClientOriginalName(), 'private'),
        ]);
    }
}
