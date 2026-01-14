<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Sistem Waris</title>
    <link rel="stylesheet" href="{{ asset('css/beranda.css') }}?v=2.4">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

    <!-- NAVBAR -->
    <header class="navbar">
        <!-- Logo dan Brand -->
        <div class="logo-brand">
            <img src="{{ asset('images/logo.png') }}" class="logo" alt="Logo Aplikasi">
            <div class="brand-text">
                <span class="brand-name">Ahli Waris</span>
                <span class="brand-subtitle">Sistem Administrasi</span>
            </div>
        </div>
        
        <!-- Menu Desktop -->
        <nav class="menu">
           <a href="{{ route('beranda') }}" class="{{ Request::is('/') ? 'active' : '' }}">Beranda</a>
          <a href="{{ route('informasi') }}" class="{{ Request::is('informasi') ? 'active' : '' }}">Informasi</a>
            <a href="{{ route('pengajuan') }}" class="{{ Request::is('pengajuan') ? 'active' : '' }}">Pengajuan</a>
        </nav>
        
        <!-- Burger Menu Button (Mobile) -->
        <button class="burger-menu" id="burgerMenu" aria-label="Toggle Navigation Menu">
            <span class="burger-line"></span>
            <span class="burger-line"></span>
            <span class="burger-line"></span>
        </button>
        
        <!-- Mobile Menu Overlay -->
        <div class="mobile-menu-overlay" id="mobileOverlay"></div>
        
        <!-- Mobile Menu Sidebar -->
        <div class="mobile-menu" id="mobileMenu">
            <button class="mobile-close-btn" id="closeMobileMenu" aria-label="Close Menu">
                <i class="fas fa-times"></i>
            </button>
              <!-- Tambahkan brand di mobile menu -->
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

<!-- Hero Section -->
<section class="hero">
    <div class="hero-container">
        <p class="hero-text">
            Menjadi ahlî waris yang amanah, adil, dan bertanggung jawab dalam menjaga, mengelola, serta melanjutkan nilai-nilai, harta peninggalan, dan silaturahmi keluarga demi tercapainya kesejahteraan bersama serta keberlanjutan generasi berikutnya.
        </p>
    </div>
</section>
</section>

<!-- CTA SECTION -->
<section class="cta-section">
    <div class="cta-container">
        <div class="cta-caption">
            Mau buat permohonan ahli waris? klick tombol berikut untuk menuju form pengajuan
        </div>
        <div class="cta-actions">
            <a href="{{ route('pengajuan') }}" class="btn-cta btn-cta-primary">
                <i class="fa-solid fa-file-signature"></i>
                <span>Pengajuan</span>
            </a>
            <a href="{{ route('download.surat') }}" class="btn-cta btn-cta-outline">
                <i class="fa-solid fa-download"></i>
                <span>Surat Permohonan</span>
            </a>
        </div>
    </div>
</section>
    <!-- SIAPA SAJA -->
    <section class="section">
        <h2>Siapa saja yang menjadi ahli waris?</h2>

        <div class="content-row">
            <p class="text">
                Ahli waris adalah individu atau kelompok orang yang secara hukum memiliki hubungan darah atau ikatan perkawinan sehingga berhak menerima pengalihan seluruh harta peninggalan serta wajib menanggung segala bentuk kewajiban atau utang dari seseorang yang telah meninggal dunia, yang dikenal sebagai Pewaris. Hak waris ini muncul secara otomatis pada saat kematian Pewaris, asalkan ahli waris tersebut masih hidup dan tidak terhalang oleh ketentuan hukum, seperti melakukan tindakan kriminal terhadap Pewaris atau adanya perbedaan keyakinan dalam perspektif hukum tertentu. Selain menerima aset berupa benda bergerak maupun tidak bergerak, ahli waris juga memegang tanggung jawab moral dan hukum untuk menyelesaikan urusan administratif jenazah serta memastikan bahwa segala tanggungan finansial yang ditinggalkan Pewaris telah diselesaikan sesuai dengan porsi bagian yang ditetapkan oleh hukum perdata, hukum Islam, maupun hukum adat yang berlaku.
                <br><br>
                Dalam konteks hukum Indonesia, penentuan siapa yang berhak menjadi ahli waris merujuk pada
                aturan hukum yang berlaku bagi Pewaris.
                
            </p>

            <img src="{{ asset('images/waris.png') }}" class="section-img" alt="Investasi Ahli waris">
        </div>
    </section>

    <!-- ALUR PENGAJUAN -->
    <section class="section">
        <h2>Alur Pengajuan Surat Waris</h2>
        <img src="{{ asset('images/alur.png') }}" class="alur-img" alt="Alur Pengajuan Surat Waris">
    </section>

   <footer class="footer-new">

    <div class="footer-logo-wrap">
        <img src="{{ asset('images/logo.png') }}" class="footer-logo-large" alt="Logo Pemerintah">
        <h2>Pemerintah Kota Administrasi<br>JAKARTA SELATAN</h2>
    </div>

    <hr class="footer-line">

    <div class="footer-columns">

        <div class="footer-col">
            <h3>Pelayanan Informasi</h3>
            <p>
                Pelayanan sistem informasi Smart Government menjadi kebutuhan pemerintah
                untuk memberikan informasi cepat, efektif dan efisien.
            </p>
        </div>

        <div class="footer-col">
            <h3>Alamat</h3>
            <p>
                Jl. Prapanca Raya No. 9,<br>
                Kecamatan Kebayoran Baru,<br>
                Kota Administrasi Jakarta Selatan,<br>
                Provinsi Daerah Khusus Jakarta,<br>
                Kode Pos 12170.
            </p>
        </div>

        <div class="footer-col">
            <h3>Kontak</h3>
            <p>
                (021) 727-886-29<br>
                walikota-jaksel@jakarta.go.id
            </p>
        </div>

        <div class="footer-col">
            <h3>Jam Operasional</h3>
            <p>
                Senin – Jumat (07.30 – 16.00)<br>
                Sabtu – Minggu (Tutup)
            </p>
        </div>

    </div>

    <div class="footer-copy">
        Hak Cipta © 2025 Pemerintah Kota Administrasi Jakarta
    </div>

</footer>

<!-- Load JavaScript File -->
<script src="{{ asset('js/beranda.js') }}"></script>

</body>
</html>
