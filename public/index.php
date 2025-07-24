<?php
session_start();

require_once __DIR__ . '/../src/config.php';

// --- DAFTAR HALAMAN ---
$public_pages = [
    'beranda' => 'beranda.php',
    'pendaftaran' => 'pendaftaran_form.php',
    // 'profil' => 'profil.php', // (Contoh jika nanti ditambahkan)
];
$admin_pages = [
    'admin_dashboard' => 'admin/dashboard.php',
    'admin_data_pendaftar' => 'admin/data_pendaftar.php',
    // 'admin_berita' => 'admin/berita.php', // (Contoh jika nanti ditambahkan)
];

// --- ROUTER ---
$page = $_GET['page'] ?? 'beranda';

// Kasus khusus untuk login & logout (tidak perlu header/footer)
if ($page === 'admin_login') {
    require_once __DIR__ . '/../templates/admin/login_form.php';
    exit();
}
if ($page === 'admin_logout') {
    session_destroy();
    header('Location: index.php?page=beranda');
    exit();
}

// --- TAMPILAN ---
require_once __DIR__ . '/../templates/header.php'; // Muat header

// Logika untuk menampilkan konten yang tepat
if (array_key_exists($page, $admin_pages)) {
    // Jika halaman yang diminta ada di daftar admin...
    if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
        // ...dan admin sudah login, tampilkan halamannya.
        require_once __DIR__ . '/../templates/' . $admin_pages[$page];
    } else {
        // ...tapi admin belum login, paksa ke halaman login.
        echo "<p>Anda harus login untuk mengakses halaman ini. Mengalihkan ke halaman login...</p>";
        echo "<script>setTimeout(function() { window.location.href = 'index.php?page=admin_login'; }, 2000);</script>";
    }
} elseif (array_key_exists($page, $public_pages)) {
    // Jika halaman ada di daftar publik, tampilkan.
    require_once __DIR__ . '/../templates/' . $public_pages[$page];
} else {
    // Jika halaman tidak ditemukan sama sekali.
    http_response_code(404);
    echo "<h1>404 - Halaman Tidak Ditemukan</h1>";
}

require_once __DIR__ . '/../templates/footer.php'; // Muat footer
?>