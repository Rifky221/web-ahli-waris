<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Sistem Waris')</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/beranda.css') }}?v=2.8">
    <link rel="stylesheet" href="{{ asset('css/ahliwaris.css') }}?v=2.4">
    <link rel="stylesheet" href="{{ asset('css/terima-kasih.css') }}">
    @stack('styles')
    <script>
        window.csrfToken = '{{ csrf_token() }}';
    </script>
    <style>
        body{margin:0}
    </style>
    
    
</head>
<body>
    <header class="navbar">
        <div class="logo-brand">
            <img src="{{ asset('images/logo.png') }}" class="logo" alt="Logo Aplikasi">
            <div class="brand-text">
                <span class="brand-name">Ahli Waris</span>
                <span class="brand-subtitle">Sistem Administrasi</span>
            </div>
        </div>
        <nav class="menu">
           <a href="{{ route('beranda') }}" class="{{ Request::is('/') ? 'active' : '' }}">Beranda</a>
           <a href="{{ route('informasi') }}" class="{{ Request::is('informasi') ? 'active' : '' }}">Informasi</a>
            <a href="{{ route('pengajuan') }}" class="{{ Request::is('pengajuan') ? 'active' : '' }}">Pengajuan</a>
        </nav>
        <button class="burger-menu" id="burgerMenu" aria-label="Toggle Navigation Menu">
            <span class="burger-line"></span>
            <span class="burger-line"></span>
            <span class="burger-line"></span>
        </button>
        <div class="mobile-menu-overlay" id="mobileOverlay"></div>
        <div class="mobile-menu" id="mobileMenu">
            <button class="mobile-close-btn" id="closeMobileMenu" aria-label="Close Menu">
                <i class="fas fa-times"></i>
            </button>
            <div class="mobile-brand">
                <img src="{{ asset('images/logo.png') }}" class="logo" alt="Logo">
                <div class="brand-text">
                    <span class="brand-name">Ahli Waris</span>
                    <span class="brand-subtitle">Sistem Administrasi</span>
                </div>
            </div>
         <a href="{{ route('beranda') }}" class="{{ Request::is('/') ? 'active' : '' }}">Beranda</a>
          <a href="{{ route('informasi') }}" class="{{ Request::is('informasi') ? 'active' : '' }}">Informasi</a>
            <a href="{{ route('pengajuan') }}" class="{{ Request::is('pengajuan') ? 'active' : '' }}">Pengajuan</a>
        </div>
    </header>

    @yield('content')

    <footer class="footer-new">
        <div class="footer-logo-wrap">
            <img src="{{ asset('images/logo.png') }}" class="footer-logo-large" alt="Logo Pemerintah">
            <h2>Pemerintah Kota Administrasi<br>JAKARTA SELATAN</h2>
        </div>
        <hr class="footer-line">
        <div class="footer-columns">
            <div class="footer-col">
                <h3>Pelayanan Informasi</h3>
                <p>Pelayanan sistem informasi Smart Government menjadi kebutuhan pemerintah untuk memberikan informasi cepat, efektif dan efisien.</p>
            </div>
            <div class="footer-col">
                <h3>Alamat</h3>
                <p>Jl. Prapanca Raya No. 9,<br>Kecamatan Kebayoran Baru,<br>Kota Administrasi Jakarta Selatan,<br>Provinsi Daerah Khusus Jakarta,<br>Kode Pos 12170.</p>
            </div>
            <div class="footer-col">
                <h3>Kontak</h3>
                <p>(021) 727-886-29<br>walikota-jaksel@jakarta.go.id</p>
            </div>
            <div class="footer-col">
                <h3>Jam Operasional</h3>
                <p>Senin – Jumat (07.30 – 16.00)<br>Sabtu – Minggu (Tutup)</p>
            </div>
        </div>
        <div class="footer-copy"></div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/beranda.js') }}"></script>
    @stack('scripts')
</body>
</html>
