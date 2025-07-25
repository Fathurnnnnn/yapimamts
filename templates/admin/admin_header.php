<?php
// File: templates/admin/admin_header.php

// Keamanan tambahan: pastikan hanya yang sudah login bisa melihat ini
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: index.php?page=admin_login');
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - MTS YAPIMA</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background-color: #f4f7f6; }
        .admin-container { display: flex; }
        .sidebar { width: 220px; background-color: #2c3e50; color: white; min-height: 100vh; padding: 20px; }
        .sidebar h3 { text-align: center; }
        .sidebar ul { list-style: none; padding: 0; }
        .sidebar ul li a { display: block; color: white; padding: 10px 15px; text-decoration: none; border-radius: 4px; margin-bottom: 5px; }
        .sidebar ul li a:hover, .sidebar ul li a.active { background-color: #3498db; }
        .main-content { flex-grow: 1; padding: 20px; }
        .header-info { display: flex; justify-content: space-between; align-items: center; background-color: white; padding: 10px 20px; border-bottom: 1px solid #ddd; margin-bottom: 20px;}
    </style>
</head>
<body>
<div class="admin-container">
    <div class="sidebar">
        <h3>ADMIN PANEL</h3>
        <ul>
            <li><a href="index.php?page=admin_dashboard">Dashboard</a></li>
            <li><a href="index.php?page=admin_data_pendaftar">Data Pendaftar</a></li>
            <li><a href="index.php?page=admin_berita_index">Manajemen Berita</a></li>
            <!-- Tambahkan menu admin lain di sini -->
        </ul>
    </div>
    <div class="main-content">
        <div class="header-info">
            <div>Selamat Datang, <strong><?php echo htmlspecialchars($_SESSION['admin_username']); ?></strong>!</div>
            <a href="index.php?page=admin_logout" style="background-color:#e74c3c; color:white; padding: 8px 12px; text-decoration:none; border-radius:4px;">Logout</a>
        </div>
        <!-- Konten halaman akan dimulai di sini -->