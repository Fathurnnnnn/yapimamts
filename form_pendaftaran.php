<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Formulir Pendaftaran - MTS YAPIMA</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .form-container { padding: 120px 20px 40px; max-width: 800px; margin: auto; }
        .form-container h1 { text-align: center; margin-bottom: 30px; }
        .form-section { margin-bottom: 30px; }
        .form-section h3 { border-bottom: 1px solid #ddd; padding-bottom: 10px; margin-bottom: 20px; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; }
        .form-group input, .form-group select, .form-group textarea { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; }
        .btn { padding: 12px 30px; background: var(--primary-color); color: white; border: none; cursor: pointer; border-radius: 5px; font-size: 1rem; }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <main class="form-container">
        <h1>Formulir Pendaftaran Siswa Baru</h1>
        <form action="proses_pendaftaran.php" method="POST">
            <section class="form-section">
                <h3>Data Calon Siswa</h3>
                <div class="form-group"><label>Nama Lengkap</label><input type="text" name="nama_lengkap" required></div>
                <div class="form-group"><label>NISN</label><input type="text" name="nisn" required></div>
                <div class="form-group"><label>Tempat Lahir</label><input type="text" name="tempat_lahir" required></div>
                <div class="form-group"><label>Tanggal Lahir</label><input type="date" name="tanggal_lahir" required></div>
                <div class="form-group"><label>Jenis Kelamin</label><select name="jenis_kelamin" required><option value="Laki-laki">Laki-laki</option><option value="Perempuan">Perempuan</option></select></div>
                <div class="form-group"><label>Agama</label><input type="text" name="agama" value="Islam" required></div>
                <div class="form-group"><label>Alamat Lengkap</label><textarea name="alamat" required></textarea></div>
                <div class="form-group"><label>Sekolah Asal</label><input type="text" name="sekolah_asal" required></div>
            </section>
            <section class="form-section">
                <h3>Data Orang Tua</h3>
                <div class="form-group"><label>Nama Ayah</label><input type="text" name="nama_ayah" required></div>
                <div class="form-group"><label>No. Telepon Ayah</label><input type="tel" name="telepon_ayah" required></div>
                <div class="form-group"><label>Nama Ibu</label><input type="text" name="nama_ibu" required></div>
                <div class="form-group"><label>No. Telepon Ibu</label><input type="tel" name="telepon_ibu" required></div>
            </section>
            <button type="submit" class="btn">Kirim Pendaftaran</button>
        </form>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>