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
use Swis\Filament\Backgrounds\FilamentBackgroundsPlugin;
use Swis\Filament\Backgrounds\ImageProviders\MyImages;
use Althinect\FilamentSpatieRolesPermissions\FilamentSpatieRolesPermissionsPlugin;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use Spatie\Permission\Traits\HasRoles;
use Filament\Support\Facades\FilamentColor;


class AdminPanelProvider extends PanelProvider
{
    

    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('admin')
            ->default()            
            ->path('admin')
            ->login(  )
            ->font('Inter')
            ->darkMode(false)
            ->sidebarWidth('20rem')           
            ->colors([
                // Warna utama - 
               'primary' => [ // Biru tua yang lebih natural
                50 => '#f0fdf4',
                100 => '#dcfce7',
                200 => '#bbf7d0',
                300 => '#86efac',
                400 => '#4ade80',
                500 => '#22c55e', // Hijau utama
                600 => '#16a34a',
                700 => '#15803d',
                800 => '#166534',
                900 => '#14532d',
                950 => '#052e16',
    ],
    'success' => [ // Hijau sebagai warna sekunder utama
        50 => '#f0fdf4',
        100 => '#dcfce7',
        200 => '#bbf7d0',
        300 => '#86efac',
        400 => '#4ade80',
        500 => '#22c55e', // Hijau utama
        600 => '#16a34a',
        700 => '#15803d',
        800 => '#166534',
        900 => '#14532d',
        950 => '#052e16',
    ],
    'emerald' => [ // Nuansa hijau alternatif
        50 => '#ecfdf5',
        100 => '#d1fae5',
        200 => '#a7f3d0',
        300 => '#6ee7b7',
        400 => '#34d399', // Hijau zamrud
        500 => '#10b981',
        600 => '#059669',
        700 => '#047857',
        800 => '#065f46',
        900 => '#064e3b',
        950 => '#022c22',
    ],
    'teal' => [ // Hijau kebiruan untuk variasi
        50 => '#f0fdfa',
        100 => '#ccfbf1',
        200 => '#99f6e4',
        300 => '#5eead4',
        400 => '#2dd4bf', // Teal medium
        500 => '#14b8a6',
        600 => '#0d9488',
        700 => '#0f766e',
        800 => '#115e59',
        900 => '#134e4a',
        950 => '#042f2e',
    ],
    'danger' => [ // Tetap mempertahankan merah untuk error
        50 => '#fef2f2',
        100 => '#fee2e2',
        200 => '#fecaca',
        300 => '#fca5a5',
        400 => '#f87171',
        500 => '#ef4444',
        600 => '#dc2626',
        700 => '#b91c1c',
        800 => '#991b1b',
        900 => '#7f1d1d',
        950 => '#450a0a',
    ]
                
            ])
            ->brandLogo(asset('images/Logo.png'))
            ->brandLogoHeight('3rem')
           
            ->favicon(asset('images/Logo.png'))
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
            ])
            ->plugins([
                FilamentBackgroundsPlugin::make()
                    ->showAttribution(false),
                    \BezhanSalleh\FilamentShield\FilamentShieldPlugin::make(),
            ]) ;
    }
}
