<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use App\Models\Anggota;
use Filament\Widgets\StatsOverviewWidget\Stat;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AnggotaStats extends BaseWidget
{
    use HasWidgetShield;
    
    protected static ?string $pollingInterval = '30s'; // Auto-refresh setiap 30 detik
    
    protected function getHeading(): string
    {
        return 'Statistik Anggota Berdasarkan Kota Usaha';
    }

    protected function getColumns(): int
    {
        return 3; // Sesuaikan dengan jumlah kota
    }

    protected function getCards(): array
    {
        $daftarKota = [
            'JAKARTA SELATAN',
            'JAKARTA UTARA',
            'JAKARTA TIMUR',
            'JAKARTA PUSAT',
            'JAKARTA BARAT'
        ];


        $data = Anggota::selectRaw('Kota_Usaha, COUNT(*) as total')
            ->whereNotNull('Kota_Usaha')
            ->whereIn('Kota_Usaha', $daftarKota)
            ->groupBy('Kota_Usaha')
            ->pluck('total', 'Kota_Usaha')
            ->toArray();

        $totalSemua = array_sum($data); 
        $stats = [];
        $colors = [
            'JAKARTA SELATAN' => 'primary',
            'JAKARTA UTARA' => 'success',
            'JAKARTA TIMUR' => 'warning',
            'JAKARTA PUSAT' => 'danger',
            'JAKARTA BARAT' => 'info'
        ];

        foreach ($daftarKota as $kota) {
            $jumlah = $data[$kota] ?? 0;
        
            $stats[] = Stat::make("KOTA {$kota}", $jumlah)
                ->description("Total: {$jumlah} (" . ($totalSemua > 0 ? round(($jumlah / $totalSemua) * 100, 1) : 0) . "%)")
                ->color($colors[$kota])
                ->chart($this->getChartData($kota))
                ->icon($this->getIcon($kota))
                ->descriptionIcon($jumlah > 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-minus')
                ->extraAttributes([
                    'class' => 'hover:shadow-lg transition-shadow duration-300 rounded-xl flex flex-col justify-center items-center text-center',
                    'style' => 'min-height: 120px;'
                ]);
        }

        return $stats;
    }

    protected function getIcon(string $kota): string
    {
        $icons = [
            'JAKARTA SELATAN' => 'heroicon-o-building-office-2',
            'JAKARTA UTARA' => 'heroicon-o-building-storefront',
            'JAKARTA TIMUR' => 'heroicon-o-home-modern',
            'JAKARTA PUSAT' => 'heroicon-o-building-library',
            'JAKARTA BARAT' => 'heroicon-o-shopping-bag'
        ];
        
        return $icons[$kota];
    }

    protected function getChartData(string $kota): array
    {
        // Contoh data chart dummy (bisa diganti dengan data real)
        return match($kota) {
            'JAKARTA SELATAN' => [15, 4, 10, 2, 12, 4, 12],
            'JAKARTA UTARA' => [10, 3, 5, 8, 3, 15, 10],
            'JAKARTA TIMUR' => [7, 11, 5, 4, 14, 8, 6],
            'JAKARTA PUSAT' => [5, 8, 3, 6, 2, 9, 4],
            'JAKARTA BARAT' => [12, 5, 8, 3, 9, 5, 11]
        };
    }
//     protected function getChartData(string $kota): array  
// {
//     $dates = collect(range(6, 0))->map(function ($i) {
//         return Carbon::today()->subDays($i)->format('Y-m-d');
//     });

//     $data = Anggota::select(DB::raw("DATE(created_at) as tanggal"), DB::raw("COUNT(*) as jumlah"))
//         ->where('Kota_Usaha', $kota)
//         ->whereBetween('created_at', [Carbon::today()->subDays(6), Carbon::today()])
//         ->groupBy(DB::raw("DATE(created_at)"))
//         ->pluck('jumlah', 'tanggal');

//     return $dates->map(function ($date) use ($data) {
//         return $data->get($date, 0); // default 0 jika tidak ada data di tanggal itu
//     })->toArray();
// }
}