<?php

namespace App\Filament\Widgets;


use App\Models\Anggota;
use Filament\Widgets\Widget;
use Illuminate\Contracts\View\View;
use Livewire\WithPagination;



class AnggotaWilayahStats extends Widget
{
    protected function getColumn(): int
    {
        return 1; // Menampilkan dalam satu kolom penuh
    }
    
    use WithPagination;
    
    protected static string $view = 'filament.widgets.anggota-wilayah-stats';

    // Properti untuk filter
    // public $provinsi;
    // public $kabupaten;
    public $kecamatan;
    public $kelurahan;
    public $kotatinggal;

    // public $provinsiusaha;
    // public $kabupatenusaha;
    public $kecamatanusaha;
    public $kelurahanusaha;
    public $kotatinggalusaha;





    // Ambil data berdasarkan filter yang dipilih
    public function getData()
    {
        $query = Anggota::query();

//Query berdasarkan alamat anggota --  start

        // if ($this->provinsi) {
        //     $query->where('Provinsi_Tinggal', $this->provinsi);
        // }

        // if ($this->kabupaten) {
        //     $query->where('Kabupaten_Tinggal', $this->kabupaten);
        // }

        if ($this->kecamatan) {
            $query->where('Kecamatan_Tinggal', $this->kecamatan);
        }

        if ($this->kelurahan) {
            $query->where('Kelurahan_Tinggal', $this->kelurahan);
        }

        if ($this->kotatinggal) {
            $query->where('Kota_Tinggal', $this->kotatinggal);
        }

//Query berdasarkan alamat anggota --  end

//Query berdasarkan alamat usaha --  start
        // if ($this->provinsiusaha) {
        //     $query->where('Provinsi_Usaha', $this->provinsiusaha);
        // }

        // if ($this->kabupatenusaha) {
        //     $query->where('Kabupaten_Usaha', $this->kabupatenusaha);
        // }

        if ($this->kecamatanusaha) {
            $query->where('Kecamatan_Usaha', $this->kecamatanusaha);
        }

        if ($this->kelurahanusaha) {
            $query->where('Kelurahan_Usaha', $this->kelurahanusaha);
        }

        if ($this->kotatinggalusaha) {
            $query->where('Kota_Usaha', $this->kotatinggalusaha);
        }
//Query berdasarkan alamat usaha --  end
        return $query->paginate(10);
    }

    // Render widget
    public function render(): View
{
    $data = $this->getData();

    return view('filament.widgets.anggota-wilayah-stats', [
        'data' => $data,
    ]);
}

public function refreshData()
{
    $this->render(); // atau hanya panggil getData() kembali
}

public function resetFilters()
{
    // Reset semua properti filter ke null atau string kosong
    $this->kecamatan = null;
    $this->kelurahan = null;
    $this->kotatinggal = null;

    $this->kecamatanusaha = null;
    $this->kelurahanusaha = null;
    $this->kotatinggalusaha = null;

    // Panggil ulang render untuk update data
    $this->render();
}

public $selectedAnggota;

public function showDetail($id)
{
    $this->selectedAnggota = Anggota::find($id);
}
public function closeModal()
{
    $this->selectedAnggota = null;
    
}



protected $listeners = ['refreshComponent' => '$refresh'];


    
}