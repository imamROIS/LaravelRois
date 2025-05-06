<?php

namespace App\Filament\Resources;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Filament\Resources\AnggotaResource\Pages;
use App\Models\Anggota;
use Doctrine\DBAL\Schema\Table;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use App\Filament\Widgets\AnggotaStats;
use App\Filament\Widgets\AnggotaWilayahStats;
use Filament\Tables\Table as TablesTable;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;

class AnggotaResource extends Resource
{
    protected static ?string $model = Anggota::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group'; 
    protected static ?string $pluralLabel = 'Biodata';
   
   

    
    


    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
        
        
        
        ->schema([
            
            Forms\Components\Grid::make(1)->schema([
            ]),
            Forms\Components\Section::make('Informasi Pribadi')->extraAttributes([
                'style' => '
                    filter: drop-shadow(0 0 0.5rem #052e16);                    
                    background-color: #16a34a;
                    
                    
                    border-radius: 10px;

                    @media (prefers-color-scheme: dark) {
                        background-color: #5eead4;
                        
                    }'
            ])->schema([
                
                TextInput::make('ID_Anggota')
                    ->datalist(Anggota::pluck('ID_Anggota')->unique()->toArray())
                    ->label('ID Anggota')
                    ->helperText('Kosongkan ID Anggota apabila tidak ada')
                    ->unique(Anggota::class, 'ID_Anggota', ignoreRecord: true),
                Forms\Components\Grid::make(4)->schema([
                        TextInput::make('Nama_Anggota')
                            ->label('Nama Anggota')
                            ->columnSpan(2)
                            ->required(),
                        Select::make('Jenis_Kelamin')
                            ->options([
                                        'Laki-laki' => 'Laki-laki',
                                        'Perempuan' => 'Perempuan',
                                    ])

                            ->label('Jenis Kelamin')
                            ->default(fn ($record) => $record?->Jenis_Kelamin) // Menjaga nilai saat edit
                            ->columnSpan(1)
                            ->default('Laki-laki')
                            ->required(),
                        TextInput::make('No_KTP_NIK')
                                             
                        ->label('No KTP/NIK')
                        ->required(),
                                                        ]),

                Forms\Components\Grid::make(3)->schema([
                    TextInput::make('No_Handphone')
                        
                        ->label('No Handphone')
                        ->required(),
                    TextInput::make('Email')
                        ->email()
                        ->label('Email'),
                    TextInput::make('Sosmed')
                        ->label('Akun Media Sosial'),
                        
                    ]),

                    Forms\Components\Section::make('Alamat Tinggal')->extraAttributes([
                        'style' => '
                            filter: drop-shadow(0 0 0.5rem #052e16);                    
                            background-color: #22c55e;
                            
                            
                            border-radius: 10px;
        
                            @media (prefers-color-scheme: dark) {
                                background-color: #5eead4;
                                
                            }'
                    ])->schema([
                        Textarea::make('Alamat_Tinggal')->label('Alamat Tinggal')->required(),
                        // TextInput::make('Provinsi_Tinggal')->label('Provinsi Tinggal')->helperText('Nama Provinsi saja') ->required(),
                        Forms\Components\Grid::make(4)->schema([
                        // TextInput::make('Kabupaten_Tinggal')->label('Kabupaten Tinggal')->helperText('Nama Kabupaten saja') ->required(),
                        TextInput::make('Kelurahan_Tinggal')->helperText('Nama Kelurahan saja')->label('Kelurahan Tinggal')
                        
                        
                        ->datalist(Anggota::pluck('Kelurahan_Tinggal')->unique()->toArray())
                        
                        ->required(),
                        TextInput::make('Kecamatan_Tinggal')->helperText('Nama Kecamatan saja') ->label('Kecamatan Tinggal')
                        ->datalist(Anggota::pluck('Kecamatan_Tinggal')->unique()->toArray())
                        ->required(),

                        
                        Select::make('Kota_Tinggal')
                        ->label('Kota Tinggal')
                        ->options([
                                    'Jakarta Utara' => 'JAKARTA UTARA',
                                    'Jakarta Selatan' => 'JAKARTA SELATAN',
                                    'Jakarta Barat' => 'JAKARTA BARAT',
                                    'Jakarta Timur' => 'JAKARTA TIMUR',
                                    'Jakarta Pusat' => 'JAKARTA PUSAT',
                                    ])->required(),
        
                        ]),
                        
                        
                    ]),

                
                

            ]),



            Forms\Components\Section::make('Informasi Usaha')->extraAttributes([
                'style' => '
                    filter: drop-shadow(0 0 0.5rem #052e16);                    
                    background-color: #16a34a;
                    
                    
                    border-radius: 10px;

                    @media (prefers-color-scheme: dark) {
                        background-color: #5eead4;
                        
                    }'
            ])->schema([
                TextInput::make('Nama_Usaha')->label('Nama Usaha')->required(),


                Forms\Components\Section::make('Alamat Usaha')->extraAttributes([
                    'style' => '
                        filter: drop-shadow(0 0 0.5rem #052e16);                    
                        background-color: #22c55e;
                        
                        
                        border-radius: 10px;
    
                        @media (prefers-color-scheme: dark) {
                            background-color: #5eead4;
                            
                        }'
                ])->schema([
                    Textarea::make('Alamat_Usaha')->label('Alamat Usaha')->required(),
                    // TextInput::make('Provinsi_Usaha')->label('Provinsi Usaha')->helperText('Nama Provinsi saja') ->required(),
                    Forms\Components\Grid::make(4)->schema([
                        // TextInput::make('Kabupaten_Usaha')->label('Kabupaten Usaha')->required(),

                        TextInput::make('Kelurahan_Usaha')->label('Kelurahan Usaha')
                        ->datalist(Anggota::pluck('Kelurahan_Usaha')->unique()->toArray())
                        ->required(),
                        
                        TextInput::make('Kecamatan_Usaha')->label('Kecamatan Usaha')
                        ->datalist(Anggota::pluck('Kecamatan_Usaha')->unique()->toArray())
                        ->required(),
                        
                        Select::make('Kota_Usaha')
                        ->options([
                                    'Jakarta Utara' => 'JAKARTA UTARA',
                                    'Jakarta Selatan' => 'JAKARTA SELATAN',
                                    'Jakarta Barat' => 'JAKARTA BARAT',
                                    'Jakarta Timur' => 'JAKARTA TIMUR',
                                    'Jakarta Pusat' => 'JAKARTA PUSAT',
                                ])->required(),

                        
                    ]),
                    
                    
                ]),

                Select::make('Bidang_Usaha')->label('Jenis Usaha')->options([
                    'KULINER' => 'KULINER',
                    'FASYEN DAN AKSESORI' => 'FASYEN DAN AKSESORI',    
                    'PRODUK KECANTIKAN' => 'PRODUK KECANTIKAN',
                ]),

                TextInput::make('Jenis_Produk')->label('Jenis Produk')->required(),
                TextInput::make('Lama_Berusaha')->label('Lama Berusaha (tahun)')->numeric()->required(),
                Select::make('Pemasaran_Produk')->label('Metode Pemasaran Produk')->options([
                    'online' => 'Online',
                    'offline' => 'Ofline',
                    'online dan offline' => 'Online dan Ofline',
                    'lainnya' => 'Lainnya',
                ])
                ->default('online dan offline') // Menjaga nilai saat edit
                 ->required(),
                 TextInput::make('Jumlah_Cabang')->label('Jumlah Cabang')->numeric()->minValue(0) ->default(0),
            ]),

            Forms\Components\Section::make('Informasi Keuangan')
            ->extraAttributes([
                'style' => '
                    filter: drop-shadow(0 0 0.5rem #052e16);                    
                    background-color: #16a34a;
                    
                    
                    border-radius: 10px;

                    @media (prefers-color-scheme: dark) {
                        background-color: #5eead4;
                        
                    }'
            ])
            
            ->schema([
                TextInput::make('Omzet_Harian')->label('Omzet Harian')->numeric()->required(),
                TextInput::make('Omzet_Mingguan')->label('Omzet Mingguan')->numeric()->required(),
                TextInput::make('Omzet_Bulanan')->label('Omzet Bulanan')->numeric()->required(),

            ]),

            Forms\Components\Section::make('Dokumen Pendukung')
            ->extraAttributes([
                'style' => '
                    filter: drop-shadow(0 0 0.5rem #052e16);                    
                    background-color: #16a34a;
                    
                    
                    border-radius: 10px;

                    @media (prefers-color-scheme: dark) {
                        background-color: #5eead4;
                        
                    }'
            ])
            ->schema([
                FileUpload::make('Dokumen_KTP')->label('KTP/KITAS')->required(),

                FileUpload::make('Foto_Produk')->label('Foto Produk')->nullable(),
                FileUpload::make('Foto_Tempat_Usaha')->label('Foto Tempat Usaha')->nullable(),                
                FileUpload::make('Dokumen_NIB')->label('Dokumen NIB'),
                FileUpload::make('Dokumen_Sertifikat_Halal')->label('Dokumen Sertifikat Halal')->nullable(),
                
            ]),
        ]);
        
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            TextColumn::make('ID_Anggota')
            ->label('ID Anggota') 
            ->sortable()
            ->searchable()
            ->description(fn ($record) => $record->No_KTP_NIK ?? '')
            ->toggleable(),
            TextColumn::make('Nama_Anggota')
            ->label('Nama Anggota')
            ->sortable()
            ->searchable()
            ->toggleable()
            ->description(fn ($record) => $record->Email ?? ''),
            TextColumn::make('No_KTP_NIK')                
            ->label('No KTP/NIK')
            ->sortable()
            ->searchable()
            ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('No_Handphone')                
            ->label('No Handphone')
            ->sortable()
            ->searchable()
            ->toggleable()
            ->url(fn ($record) => "tel:{$record->No_Handphone}"),
            TextColumn::make('Email')                
            ->label('Email')
            ->sortable()
            ->searchable()
            ->toggleable()
            ->url(fn ($record) => "mailto:{$record->Email}")
            ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('Nama_Usaha')                
            ->label('Nama Usaha')
            ->sortable()
            ->searchable()
            ->toggleable()
            ->limit(30)
            ->tooltip(fn ($record) => $record->Jenis_Produk ?? ''),

            TextColumn::make('Omzet_Harian')                
            ->label('Omzet Harian')
            ->sortable()
            ->numeric()
            ->money('IDR')
            ->toggleable(),
            TextColumn::make('created_at')                
            ->label('Tanggal Dibuat')
            ->dateTime()
            ->sortable()
            ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('lastModifiedAnggotaBy.name')
            ->label('Modified By')
            ->sortable()
            ->toggleable(isToggledHiddenByDefault: true),
            
            
        ])->filters([
            Tables\Filters\TrashedFilter::make(),
            
           
        ])
        
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\ViewAction::make(),
            Tables\Actions\Action::make('export-pdf')
    ->label('Export PDF')
    
    ->url(fn (Anggota $record) => route('export.anggota.pdf', $record)),     

            
            
            
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
            Tables\Actions\ForceDeleteBulkAction::make(),
            
        ])
        ->defaultSort('created_at', 'desc')
        ->persistSortInSession()
        ->persistSearchInSession()
        ->persistColumnSearchesInSession()
        ->reorderable('sort_order')
        ->paginated([10, 25, 50, 100, 'all']);
    }

    public static function getRelations(): array
    {
        return [
            
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAnggotas::route('/'),
            'create' => Pages\CreateAnggota::route('/create'),
            'edit' => Pages\EditAnggota::route('/{record}/edit'),

        ];
    }
    
    
    
}
