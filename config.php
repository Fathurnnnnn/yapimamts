<?php
// Mulai session
session_start();

// Konfigurasi Database
define('DB_HOST', 'localhost');
define('DB_USER', 'root'); // Ganti jika username database Anda berbeda
define('DB_PASS', '');     // Ganti jika password database Anda berbeda
define('DB_NAME', 'db_mts_yapima');

// Buat Koneksi
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Cek Koneksi
if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}

// Set timezone
date_default_timezone_set('Asia/Jakarta');
?>