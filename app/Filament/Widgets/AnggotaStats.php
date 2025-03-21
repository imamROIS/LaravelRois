<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;

use App\Models\Anggota;
use Filament\Forms\Components\Section;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget\Card;

class AnggotaStats extends BaseWidget
{
    protected function getHeading(): string
    {
        return 'Statistik Anggota';
    }

    protected function getColumns(): int
    {
        return 3; // Pastikan bisa sejajar dalam 1 baris
    }

    protected function getCards(): array
    {
        $stats = [];

        // Ambil daftar kota usaha yang memiliki data
        $data = Anggota::whereNotNull('Kota_Usaha')
            ->selectRaw('Kota_Usaha, COUNT(*) as total')
            ->groupBy('Kota_Usaha')
            ->get();

        // Loop data dan buat Stat card untuk masing-masing Kota_Usaha
        foreach ($data as $item) {
            $stats[] = Stat::make("KOTA {$item->Kota_Usaha}", $item->total)
                // ->description("{$item->Kota_Usaha}")
                ->color('info')
                ->extraAttributes(['class' => 'flex justify-center items-center text-center']);
        }

        return $stats;
    }
}
