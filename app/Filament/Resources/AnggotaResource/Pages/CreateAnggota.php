<?php

namespace App\Filament\Resources\AnggotaResource\Pages;

use App\Filament\Resources\AnggotaResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateAnggota extends CreateRecord
{
    protected static string $resource = AnggotaResource::class;
    protected static bool $canCreateAnother = false;
    protected static ?string $title = 'Pengisian Data Anggota';

    // protected static ?string $actionCreateAnotherLabel  = 'Simpan';

    protected function getRedirectUrl(): string
    {
        return $this ->getResource()::getUrl('create');
    }

    protected function getCreateFormAction(): \Filament\Actions\Action
    {
        return parent::getCreateFormAction()
            ->label('SIMPAN')
            ->color('success')
            ->icon('heroicon-s-check');
    }
    protected function getCancelFormAction(): Action
    {
        return parent::getCreateFormAction()
            ->label('BATAL')
            ->color('danger')
            ->icon('heroicon-s-x-mark');
            
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['lastmodifiedAnggota'] = Auth::id(); 
        // Set ID pengguna aktif
        return $data;
    }
    
  

    
    


}
