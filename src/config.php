<?php
// Pastikan kita berada di folder proyek yang benar
// Ini memanggil file autoload.php dari dalam folder 'vendor'
require __DIR__ . '/vendor/autoload.php';

// Menggunakan library Dotenv untuk memuat file .env yang sudah kita buat
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Mengambil variabel konfigurasi dari .env menggunakan $_ENV
// Variabel ini sekarang aman dan tidak tersimpan di GitHub
$host = $_ENV['DB_HOST'];
$user = $_ENV['DB_USER'];
$pass = $_ENV['DB_PASS'];
$db_name = $_ENV['DB_NAME'];

// Membuat koneksi ke database menggunakan variabel di atas
$koneksi = mysqli_connect($host, $user, $pass, $db_name);

// Melakukan pengecekan koneksi untuk memastikan semuanya berjalan lancar
if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>

// Set timezone
date_default_timezone_set('Asia/Jakarta');
?>