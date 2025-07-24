<?php
// File ini akan dipanggil di setiap halaman admin
require_once '../config.php';
// Keamanan: Cek apakah admin sudah login
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?php echo isset($page_title) ? $page_title : 'Admin Dasbor'; ?> - MTS YAPIMA</title>
    <link rel="stylesheet" href="../css/style.css">
    
    <!-- ======================================================= -->
    <!-- ===== CSS MASTER UNTUK SELURUH ADMIN PANEL ===== -->
    <!-- ======================================================= -->
    <style>
        body { background-color: #f8f9fa; }
        
        /* HEADER UTAMA ADMIN */
        .admin-global-header {
            background-color: var(--secondary-color); color: white; padding: 1rem 0;
            position: fixed; width: 100%; top: 0; left: 0; z-index: 1001;
        }
        .admin-global-header .container { display: flex; justify-content: space-between; align-items: center; }
        .admin-title { font-size: 1.2rem; font-weight: bold; }
        .admin-global-header nav a { color: #ccc; text-decoration: none; margin-left: 20px; }
        .admin-global-header nav a:hover { color: white; }
        .logout-btn { background-color: var(--primary-color); padding: 8px 12px; border-radius: 5px; }

        /* KONTEN UTAMA & JUDUL HALAMAN */
        .admin-content {
            padding: 100px 20px 40px; margin: auto; max-width: 1100px;
        }
        .page-header {
            display: flex; justify-content: space-between; align-items: center;
            margin-bottom: 30px; border-bottom: 1px solid #ddd; padding-bottom: 20px;
        }
        .page-header h2 { text-align: left; margin: 0; font-size: 2rem; }
        
        /* STYLING UNTUK TABEL (Daftar Berita & Pendaftar) */
        .table-wrapper { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 12px 15px; border: 1px solid #ddd; vertical-align: middle; text-align: left; }
        th { background-color: #f2f2f2; font-weight: bold; }
        td img { width: 100px; height: auto; border-radius: 4px; }
        
        /* STYLING UNTUK FORM (Tambah Berita & Info PPDB) */
        .form-group { margin-bottom: 20px; }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            font-size: 1rem;
        }
        .form-group input, .form-group textarea, .form-group select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }
        .form-group textarea { height: 250px; }
        .btn { display: inline-block; padding: 10px 20px; background: var(--primary-color); color: white; text-decoration: none; border: none; border-radius: 5px; cursor: pointer; font-size: 1rem; }
        
    </style>
</head>
<body>
    <header class="admin-global-header">
        <div class="container">
            <span class="admin-title">ADMIN PANEL MTS YAPIMA</span>
            <nav>
                <a href="index.php">Berita</a>
                <a href="ppdb.php">Info PPDB</a>
                <a href="data_pendaftar.php">Data Pendaftar</a>
                <a href="logout.php" class="logout-btn">Logout</a>
            </nav>
        </div>
    </header>

    <main class="admin-content">
        <!-- Konten dari setiap halaman akan dimulai di sini -->