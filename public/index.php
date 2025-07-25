<?php
session_start();

require_once __DIR__ . '/../src/config.php';
require_once __DIR__ . '/../src/Database.php';

// --- DAFTAR HALAMAN ---
$public_pages = [
    'beranda' => 'beranda.php',
    'pendaftaran' => 'pendaftaran_form.php',
    'berita_list' => 'berita_list_public.php',
    'berita_detail' => 'berita_detail_public.php',
];
$admin_pages = [
    'admin_dashboard' => 'admin/dashboard.php',
    'admin_data_pendaftar' => 'admin/data_pendaftar.php',
    'admin_berita_index' => 'admin/berita_index.php',
    'admin_berita_form'  => 'admin/berita_form.php',
];

// --- ROUTER ---
$page = $_GET['page'] ?? 'beranda';
$is_admin_page = array_key_exists($page, $admin_pages);

// --- KASUS KHUSUS (Tanpa Layout) ---
if ($page === 'admin_login') { /* ... kode ... */ }
if ($page === 'admin_logout') { /* ... kode ... */ }
if ($page === 'admin_berita_delete' && isset($_GET['id'])) { /* ... kode ... */ }


// --- MEMUAT LAYOUT YANG SESUAI ---
if ($is_admin_page) {
    require_once __DIR__ . '/../templates/admin/admin_header.php';
} else {
    require_once __DIR__ . '/../templates/header.php';
}

// --- MEMUAT KONTEN HALAMAN ---
if ($is_admin_page) {
    if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
        require_once __DIR__ . '/../templates/' . $admin_pages[$page];
    } else {
        header('Location: index.php?page=admin_login');
        exit();
    }
} elseif (array_key_exists($page, $public_pages)) {
    require_once __DIR__ . '/../templates/' . $public_pages[$page];
} else {
    http_response_code(404);
    echo "<h1>404 - Halaman Tidak Ditemukan</h1>";
}

// --- MENUTUP LAYOUT YANG SESUAI ---
if ($is_admin_page) {
    require_once __DIR__ . '/../templates/admin/admin_footer.php';
} else {
    require_once __DIR__ . '/../templates/footer.php';
}
?>