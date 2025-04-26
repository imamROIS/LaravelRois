<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Anggota extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $table = 'anggotas';

    protected $primaryKey = 'id';

    protected $fillable = [

        //Informasi Pribadi Model -- start
        'ID_Anggota',
        'Nama_Anggota',
        'Jenis_Kelamin',
        'No_KTP_NIK',
        'No_Handphone',
        'Email',
        'Sosmed',
        'Alamat_Tinggal',
        'Provinsi_Tinggal',
        'Kabupaten_Tinggal',
        'Kelurahan_Tinggal',
        'Kecamatan_Tinggal',
        'Kota_Tinggal',
        //Informasi Pribadi Model -- end
        //Informasi Usaha Model -- start
        'Nama_Usaha',
        'Alamat_Usaha',
        'Provinsi_Usaha',
        'Kabupaten_Usaha',
        'Kelurahan_Usaha',
        'Kecamatan_Usaha',
        'Kota_Usaha',
        'Bidang_Usaha',
        'Jenis_Produk',
        'Lama_Berusaha',
        'Pemasaran_Produk',
        'Omzet_Harian',
        'Omzet_Mingguan',
        'Omzet_Bulanan',
        'Jumlah_Cabang',
        //Informasi Usaha Model -- end
        'NIB',
        'Dokumen_KTP',
        'Dokumen_NIB',
        'Foto_Tempat_Usaha',
        'Dokumen_Sertifikat_Halal',
        'Foto_Produk',
        'lastmodifiedanggota',
    ];

    public function setNamaAnggotaAttribute($value)
    {
        $this->attributes['Nama_Anggota'] = strtoupper($value);
    }

    public function setJenisKelaminAttribute($value)
    {
        $this->attributes['Jenis_Kelamin'] = strtoupper($value);
    }

    public function setNoKTPNIKAttribute($value)
    {
        $this->attributes['No_KTP_NIK'] = strtoupper($value);
    }

    public function setNoHandphoneAttribute($value)
    {
        $this->attributes['No_Handphone'] = strtoupper($value);
    }

    public function setSosmedAttribute($value)
    {
        $this->attributes['Sosmed'] = strtoupper($value);
    }

    public function setAlamatTinggalAttribute($value)
    {
        $this->attributes['Alamat_Tinggal'] = strtoupper($value);
    }

    public function setKelurahanTinggalAttribute($value)
    {
        $this->attributes['Kelurahan_Tinggal'] = strtoupper($value);
    }

    public function setKecamatanTinggalAttribute($value)
    {
        $this->attributes['Kecamatan_Tinggal'] = strtoupper($value);
    }

    public function setKotaTinggalAttribute($value)
    {
        $this->attributes['Kota_Tinggal'] = strtoupper($value);
    }

    public function setNamaUsahaAttribute($value)
    {
        $this->attributes['Nama_Usaha'] = strtoupper($value);
    }

    public function setAlamatUsahaAttribute($value)
    {
        $this->attributes['Alamat_Usaha'] = strtoupper($value);
    }

    public function setKelurahanUsahaAttribute($value)
    {
        $this->attributes['Kelurahan_Usaha'] = strtoupper($value);
    }

    public function setKecamatanUsahaAttribute($value)
    {
        $this->attributes['Kecamatan_Usaha'] = strtoupper($value);
    }

    public function setKotaUsahaAttribute($value)
    {
        $this->attributes['Kota_Usaha'] = strtoupper($value);
    }

    public function setBidangUsahaAttribute($value)
    {
        $this->attributes['Bidang_Usaha'] = strtoupper($value);
    }

    public function setJenisProdukAttribute($value)
    {
        $this->attributes['Jenis_Produk'] = strtoupper($value);
    }

    public function setPemasaranProdukAttribute($value)
    {
        $this->attributes['Pemasaran_Produk'] = strtoupper($value);
    }

    public function setNIBAttribute($value)
    {
        $this->attributes['NIB'] = strtoupper($value);
    }

    public function lastModifiedAnggotaBy()
    {
        return $this->belongsTo(User::class, 'lastmodifiedanggota');
    }


}
