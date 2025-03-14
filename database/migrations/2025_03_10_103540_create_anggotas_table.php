<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('anggotas', function (Blueprint $table) {
        $table->id();
        $table->integer('ID_Anggota')->unique();
        $table->string('Nama_Anggota');
        $table->string('Jenis_Kelamin', 10);
        $table->string('No_KTP_NIK', 20);
        $table->string('No_Handphone', 20);
        $table->string('Email', 255);
        $table->string('Sosmed', 255);
        $table->text('Alamat_Tinggal');
        $table->string('Provinsi_Tinggal', 100)->nullable();
        $table->string('Kabupaten_Tinggal', 100)->nullable();
        $table->string('Kelurahan_Tinggal', 100);
        $table->string('Kecamatan_Tinggal', 100);
        $table->string('Kota_Tinggal', 100);
        $table->string('Nama_Usaha', 255);
        $table->text('Alamat_Usaha');
        $table->string('Provinsi_Usaha', 100)->nullable();
        $table->string('Kabupaten_Usaha', 100)->nullable();
        $table->string('Kelurahan_Usaha', 100);
        $table->string('Kecamatan_Usaha', 100);
        $table->string('Kota_Usaha', 100);
        $table->string('Bidang_Usaha', 255);
        $table->text('Jenis_Produk');
        $table->integer('Lama_Berusaha');
        $table->text('Pemasaran_Produk');
        $table->decimal('Omzet_Harian', 15, 2);
        $table->decimal('Omzet_Mingguan', 15, 2);
        $table->decimal('Omzet_Bulanan', 15, 2);
        $table->decimal('Jumlah_Cabang', 15, 2);
        $table->string('NIB', 20)->nullable();
        $table->string('Dokumen_KTP', 255);
        $table->string('Dokumen_NIB', 255)->nullable();
        $table->string('Foto_Tempat_Usaha', 20)->nullable();
        $table->string('Dokumen_Sertifikat_Halal', 255)->nullable();
        $table->string('Foto_Produk', 255)->nullable();
        $table->foreignId('lastmodifiedanggota')->nullable()->constrained('users')->nullOnDelete();
        $table->timestamps();
        $table->softDeletes();
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggotas');
    }
};
