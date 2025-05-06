<?php
use App\Models\Anggota;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaPdfController;


//welcome page

//route utama
Route::get('/', function () {
    return redirect()->route('filament.admin.pages.dashboard'); // Redirect ke dashboard Filament
});

// Route untuk export PDF
Route::get('/anggota/{anggota}/export-pdf', [AnggotaPdfController::class, 'exportPdf'])
    ->name('export.anggota.pdf');



