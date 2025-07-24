<?php
session_start();

require_once __DIR__ . '/../src/config.php';

// --- DAFTAR HALAMAN ---
$public_pages = [
    'beranda' => 'beranda.php',
    'pendaftaran' => 'pendaftaran_form.php',
];
$admin_pages = [
    'admin_dashboard' => 'admin/dashboard.php',
    'admin_data_pendaftar' => 'admin/data_pendaftar.php',
];

// --- ROUTER ---
$page = $_GET['page'] ?? 'beranda';
// Kita buat variabel boolean untuk mengecek apakah ini halaman admin
$is_admin_page = array_key_exists($page, $admin_pages);

// Kasus khusus (tanpa layout)
if ($page === 'admin_login') {
    require_once __DIR__ . '/../templates/admin/login_form.php';
    exit();
}
if ($page === 'admin_logout') {
    session_destroy();
    header('Location: index.php?page=beranda');
    exit();
}

// --- MEMUAT LAYOUT YANG SESUAI (BAGIAN YANG DIPERBAIKI) ---
if ($is_admin_page) {
    // Jika ini adalah halaman admin, muat header admin
    require_once __DIR__ . '/../templates/admin/admin_header.php';
} else {
    // Jika bukan, muat header publik biasa
    require_once __DIR__ . '/../templates/header.php';
}

// --- MEMUAT KONTEN HALAMAN ---
if ($is_admin_page) {
    // Keamanan: Pastikan hanya yang login bisa akses
    if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
        require_once __DIR__ . '/../templates/' . $admin_pages[$page];
    } else {
        // Jika belum login, paksa keluar (seharusnya sudah ditangani di admin_header)
        header('Location: index.php?page=admin_login');
        exit();
    }
} elseif (array_key_exists($page, $public_pages)) {
    require_once __DIR__ . '/../templates/' . $public_pages[$page];
} else {
    http_response_code(404);
    echo "<h1>404 - Halaman Tidak Ditemukan</h1>";
}

// --- MENUTUP LAYOUT YANG SESUAI (BAGIAN YANG DIPERBAIKI) ---
if ($is_admin_page) {
    // Jika ini adalah halaman admin, muat footer admin
    require_once __DIR__ . '/../templates/admin/admin_footer.php';
} else {
    // Jika bukan, muat footer publik biasa
    require_once __DIR__ . '/../templates/footer.php';
}
?>