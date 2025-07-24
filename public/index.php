<?php
// Memuat file konfigurasi, yang sekarang ada di folder 'src'
// ../ artinya "naik satu level folder"
require_once __DIR__ . '/../src/config.php';

// Memuat header
require_once __DIR__ . '/../templates/header.php';

// ---- Simple Router ----
// Ambil halaman yang diminta dari URL, contoh: index.php?page=kontak
// Jika tidak ada, defaultnya adalah 'beranda'
$page = $_GET['page'] ?? 'beranda';

// Daftar halaman yang diizinkan dan file-nya di folder 'templates'
$allowed_pages = [
    'beranda' => 'beranda.php',
    'pendaftaran' => 'pendaftaran_form.php',
    // Nanti kita akan tambahkan halaman lain di sini
    // 'pendaftaran' => 'form_pendaftaran.php',
    // 'detail_berita' => 'detail_berita.php',
];

// Cek apakah halaman yang diminta ada di dalam daftar yang diizinkan
if (array_key_exists($page, $allowed_pages)) {
    // Jika ada, panggil file halaman tersebut dari folder templates
    require_once __DIR__ . '/../templates/' . $allowed_pages[$page];
} else {
    // Jika halaman tidak ditemukan, tampilkan pesan error 404
    echo "<h1>404 - Halaman Tidak Ditemukan</h1>";
    echo "<p>Halaman yang Anda cari tidak ada.</p>";
}
// -----------------------

// Memuat footer
require_once __DIR__ . '/../templates/footer.php';
?>