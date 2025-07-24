html <link rel="stylesheet" href="style.css">
<!-- Header & Navigasi -->
<header>
    <div class="container">
        <a href="index.php" class="logo">
            <img src="images/logo-sekolah.png" alt="Logo MTS YAPIMA" class="logo-image">
            <span class="logo-text">MTS YAPIMA</span>
        </a>

        <!-- Navigasi Utama (termasuk hamburger) -->
        <nav class="main-nav">
            <button id="hamburger-menu" aria-label="Buka Menu">
                <span></span><span></span><span></span>
            </button>
            <ul id="nav-links">
                <li><a href="index.php#beranda">Beranda</a></li>
                <li><a href="index.php#profil">Profil</a></li>
                <li><a href="index.php#visi-misi">Visi & Misi</a></li>
                <li><a href="index.php#fasilitas">Fasilitas</a></li>
                <li><a href="index.php#ekskul">Ekskul</a></li>
                <li><a href="index.php#berita">Berita</a></li>
                <li><a href="index.php#lokasi">Lokasi</a></li>
                <!-- Tombol PPDB duplikat sudah DIHAPUS dari sini -->
            </ul>
        </nav>
        
        <!-- Tombol Aksi (hanya akan ada satu set) -->
        <div class="header-actions">
            <a href="ppdb.php" class="btn-cta">PPDB</a>
            <!-- Fitur Search akan kita aktifkan lagi nanti -->
        </div>
    </div>
</header>