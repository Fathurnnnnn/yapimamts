<?php
// Di dalam 'src/config.php'

// Memanggil autoloader dari Composer
// __DIR__ adalah 'src', jadi kita harus naik satu level ('../') untuk menemukan folder 'vendor'
require_once __DIR__ . '/../vendor/autoload.php';

// Memberitahu Dotenv untuk mencari file .env di direktori root (satu level di atas 'src')
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Mengambil variabel konfigurasi dari .env menggunakan $_ENV
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
