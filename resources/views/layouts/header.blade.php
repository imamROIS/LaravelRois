<header class="site-header">
    <div class="container">
        <div class="header-logo">
            <a href="/">
                <img src="{{ asset('images/Logo.png') }}" alt="LP UMKM DKI Jakarta" width="150">
            </a>
        </div>
        <nav class="main-nav">
            <ul>
                <li><a href="/">Beranda</a></li>
                <li><a href="#tentang">Tentang Kami</a></li>
                <li><a href="#layanan">Layanan</a></li>
                <li><a href="#kontak">Kontak</a></li>
                <li><a href="{{ route('filament.admin.auth.login') }}" class="btn-login">Login Admin</a></li>
            </ul>
        </nav>
        <button class="mobile-menu-toggle">☰</button>
    </div>
</header>