<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Filament\Widgets\Widget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Filament\Widgets\AnggotaStats;
use App\Filament\Widgets\KotaUsahaStats;

class AdminPanelProvider extends PanelProvider
{
    

    public function panel(Panel $panel): Panel
    {
        return $panel
            
            ->default()
            ->id('admin')
            ->path('admin')
            ->login(  )
            ->topNavigation()
            ->font('Inter')
            ->darkMode(false)
            ->colors([
                // Warna utama - biru tua Muhammadiyah
                'primary' => [
                    50 => '#eef3ff',
                    100 => '#d9e4ff',
                    200 => '#bccefe',
                    300 => '#90acfd',
                    400 => '#6082f9',
                    500 => '#3d5af2', 
                    600 => '#2d3fb0', // Biru tua Muhammadiyah
                    700 => '#243490',
                    800 => '#1f2a69',
                    900 => '#1d2657',
                    950 => '#0f1331',
                ],
                // Warna sekunder - kuning Muhammadiyah
                'secondary' => [
                    50 => '#fefbe8',
                    100 => '#fff8c2',
                    200 => '#ffef86',
                    300 => '#ffe246',
                    400 => '#ffce1f', // Kuning Muhammadiyah
                    500 => '#efb307',
                    600 => '#cc8a04',
                    700 => '#a36108',
                    800 => '#874c0f',
                    900 => '#723e12',
                    950 => '#422006',
                ],
                // Warna aksen/utilitas tetap sama
                
            ])
            // TAMBAHKAN KODE INI - Untuk mengubah warna section header
            
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                // Widgets\AccountWidget::class,
                

                Widgets\StatsOverviewWidget::class,
                AnggotaStats::class,
                
                
                // Widgets\FilamentInfoWidget::class,
            ])
            
            ->navigation()
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
