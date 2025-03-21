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

        // Daftar kota usaha tetap yang ingin selalu muncul
        $daftarKota = [
            'JAKARTA SELATAN',
            'JAKARTA UTARA',
            'JAKARTA TIMUR',
            'JAKARTA PUSAT',
            'JAKARTA BARAT'
        ];

        // Ambil data dari database
        $data = Anggota::selectRaw('Kota_Usaha, COUNT(*) as total')
            ->whereNotNull('Kota_Usaha')
            ->whereIn('Kota_Usaha', $daftarKota) // Hanya ambil data dari daftar kota
            ->groupBy('Kota_Usaha')
            ->pluck('total', 'Kota_Usaha')
            ->toArray();

        // Loop daftar kota usaha dan buat Stat card
        foreach ($daftarKota as $kota) {
            $jumlah = $data[$kota] ?? 0; // Jika tidak ada, set ke 0
            $stats[] = Stat::make("KOTA {$kota}", $jumlah)
                ->color($jumlah > 0 ? 'info' : 'gray')
                ->extraAttributes(['class' => 'flex justify-center items-center text-center']);
        }

        return $stats;
    }
}
