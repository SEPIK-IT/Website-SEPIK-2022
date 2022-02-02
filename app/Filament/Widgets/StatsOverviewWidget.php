<?php

namespace App\Filament\Widgets;

use App\Models\CompetitionRegistration;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverviewWidget extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make(
                'Peserta sayembara',
                CompetitionRegistration::count('id')
            )
        ];
    }
}
