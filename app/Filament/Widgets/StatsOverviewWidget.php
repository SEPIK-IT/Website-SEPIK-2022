<?php

namespace App\Filament\Widgets;

use App\Models\CompetitionRegistration;
use App\Models\Donation;
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
            ),
            Card::make(
                'Total Donasi',
                "Rp" . Donation::where('confirmation', 1)->sum('nominal')
            )
        ];
    }
}
