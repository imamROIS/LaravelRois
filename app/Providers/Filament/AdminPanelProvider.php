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
            ->registration()
            
            // ->darkMode()

            // ->brandName('UMKM Data')
            // ->brandLogo(asset('assets\images\network.png'))
            // ->favicon(asset('images/favicon.ico'))
            ->registration(false)

            ->font('Inter')
            ->darkMode(false)
            ->colors([
                'primary' => Color::Blue,
                'secondary' => Color::Amber,
                'danger' => Color::Red,
                'warning' => Color::Amber,
                'success' => Color::Green,

                
            ])
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
