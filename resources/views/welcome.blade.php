@extends('layouts.app')
@vite(['resources/sass/welcome.scss', 'resources/js/welcome.js'])

@section('content')
    <section class="hero-section">
        
        <div class="container"> 
            <div class="hero-content">
                <h1>Selamat Datang di LP UMKM DKI Jakarta</h1>
                <p>Mendorong pertumbuhan usaha mikro, kecil, dan menengah di Jakarta</p>
                <div class="hero-buttons">
                    <a href="#daftar" class="btn-primary">Daftar Sekarang</a>
                    <a href="#layanan" class="btn-secondary">Lihat Layanan</a>
                </div>
            </div>
        </div>
    </section>
    

    <section id="tentang" class="about-section">
        <div class="container">
            <h2>Tentang Kami</h2>
            <p>LP UMKM DKI Jakarta adalah lembaga yang berkomitmen untuk mendukung pengembangan usaha mikro, kecil, dan menengah di wilayah DKI Jakarta melalui berbagai program pelatihan, pendampingan, dan akses permodalan.</p>
        </div>
    </section>

    <section id="layanan" class="services-section">
        <div class="container">
            <h2>Layanan Kami</h2>
            <div class="services-grid">
                <div class="service-card">
                    <h3>Pelatihan Bisnis</h3>
                    <p>Program pelatihan untuk meningkatkan kapasitas pelaku UMKM</p>
                </div>
                <div class="service-card">
                    <h3>Akses Permodalan</h3>
                    <p>Fasilitas pinjaman modal usaha dengan bunga kompetitif</p>
                </div>
                <div class="service-card">
                    <h3>Pendampingan</h3>
                    <p>Pendampingan usaha oleh tenaga ahli berpengalaman</p>
                </div>
            </div>
        </div>
    </section>

    <section id="kontak" class="contact-section">
        <div class="container">
            <h2>Hubungi Kami</h2>
            <div class="contact-info">
                <p><strong>Alamat:</strong> Jl. Sudirman No. 1, Jakarta Pusat</p>
                <p><strong>Telepon:</strong> (021) 12345678</p>
                <p><strong>Email:</strong> info@lpumkm-jakarta.go.id</p>
            </div>
        </div>
    </section>
@endsection