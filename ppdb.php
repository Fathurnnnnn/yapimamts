<?php
require_once 'config.php';
$result = $conn->query("SELECT * FROM ppdb_info WHERE id = 1");
$info = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pendaftaran Peserta Didik Baru (PPDB) - MTS YAPIMA</title>
    <link rel="stylesheet" href="css/style.css">
    
    <style>
        /* CSS khusus untuk halaman ini */
        main.ppdb-page {
            background-color: #f8f9fa;
            padding-bottom: 60px; /* Hanya padding bawah yang dibutuhkan */
        }
        .page-content { max-width: 800px; margin: auto; }
        
        /* PERBAIKAN DI SINI: Ukuran font dikecilkan */
        .page-title {
            text-align: center;
            font-size: 2.5rem; /* Ukuran dikecilkan dari 2.8rem */
            margin-bottom: 1rem;
        }
        .page-subtitle { text-align: center; font-size: 1.1rem; color: #6c757d; margin-bottom: 2rem; }
        .status-badge-container { text-align: center; margin-bottom: 4rem; }
        .status-badge { display: inline-block; width: auto; min-width: 200px; font-size: 1.5rem; font-weight: bold; padding: 10px 30px; border-radius: 50px; color: white; text-align: center; }
        .status-badge.buka { background-color: #28a745; }
        .status-badge.tutup { background-color: #dc3545; }
        .info-section { margin-bottom: 3rem; }
        .info-section h2 { text-align: left; font-size: 2rem; border-bottom: 2px solid var(--primary-color); padding-bottom: 10px; margin-bottom: 20px; }
        .info-section p, .info-section ul { font-size: 1.1rem; line-height: 1.8; }
        .btn-daftar-container { text-align: center; margin-top: 50px; }
        .btn-daftar { padding: 18px 50px; font-size: 1.3rem; font-weight: bold; background: var(--primary-color); color: white; text-decoration: none; border-radius: 50px; }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <main class="ppdb-page">
        <div class="page-content">
            <h1 class="page-title">Pendaftaran Peserta Didik Baru (PPDB)</h1>
            <p class="page-subtitle">Tahun Ajaran 2025/2026 - <?php echo htmlspecialchars($info['gelombang']); ?></p>
            
            <div class="status-badge-container">
                <span class="status-badge <?php echo strtolower($info['status']); ?>">
                    Pendaftaran <?php echo $info['status']; ?>
                </span>
            </div>

            <div class="info-section">
                <h2>Alur Pendaftaran</h2>
                <p><?php echo nl2br(htmlspecialchars($info['alur_pendaftaran'])); ?></p>
            </div>

            <div class="info-section">
                <h2>Syarat Pendaftaran</h2>
                <p><?php echo nl2br(htmlspecialchars($info['syarat_pendaftaran'])); ?></p>
            </div>

            <div class="info-section">
                <h2>Info Penting</h2>
                <ul>
                    <li><strong>Jadwal:</strong> <?php echo htmlspecialchars($info['jadwal']); ?></li>
                    <li><strong>Kontak Person:</strong> <?php echo htmlspecialchars($info['kontak_person']); ?></li>
                </ul>
            </div>
            
            <?php if ($info['status'] == 'Buka'): ?>
                <div class="btn-daftar-container">
                    <a href="form_pendaftaran.php" class="btn-daftar">Daftar Sekarang</a>
                </div>
            <?php endif; ?>
        </div>
    </main>
    
    <?php include 'footer.php'; ?>
</body>
</html>