<?php

namespace App\Filament\Resources\SocialMediaMovementResource\Pages;

use App\Filament\Resources\SocialMediaMovementResource;
use Artisan;
use Filament\Resources\Pages\EditRecord;

class EditSocialMediaMovement extends EditRecord
{
    protected static string $resource = SocialMediaMovementResource::class;

    private function refreshUniversityCache()
    {
        Artisan::call('universitycache:refresh');
    }

    protected function afterSave(): void
    {
        $this->refreshUniversityCache();
    }

    protected function afterDelete(): void
    {
        $this->refreshUniversityCache();
    }
}
