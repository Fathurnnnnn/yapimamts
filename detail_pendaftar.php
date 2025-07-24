<?php
require_once '../config.php';
if (!isset($_SESSION['admin_logged_in'])) { header('Location: login.php'); exit(); }

if (!isset($_GET['id'])) {
    die("ID pendaftar tidak ditemukan.");
}

$id_pendaftar = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM calon_siswa WHERE id = ?");
$stmt->bind_param("i", $id_pendaftar);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("Data pendaftar dengan ID tersebut tidak ditemukan.");
}
$data = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Pendaftar - <?php echo htmlspecialchars($data['nama_lengkap']); ?></title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body { background-color: #f0f2f5; }
        .detail-wrapper { max-width: 800px; margin: 40px auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h1 { text-align: center; margin-bottom: 30px; }
        .detail-grid { display: grid; grid-template-columns: 200px 1fr; gap: 10px 20px; }
        .detail-grid strong { font-weight: bold; }
        .detail-section { margin-top: 30px; border-top: 1px solid #eee; padding-top: 20px; }
    </style>
</head>
<body>
    <div class="detail-wrapper">
        <h1>Detail Pendaftar</h1>

        <div class="detail-section">
            <h3>Data Calon Siswa</h3>
            <div class="detail-grid">
                <strong>Nama Lengkap:</strong>       <span><?php echo htmlspecialchars($data['nama_lengkap']); ?></span>
                <strong>NISN:</strong>               <span><?php echo htmlspecialchars($data['nisn']); ?></span>
                <strong>Tempat, Tgl Lahir:</strong>  <span><?php echo htmlspecialchars($data['tempat_lahir']) . ', ' . date('d F Y', strtotime($data['tanggal_lahir'])); ?></span>
                <strong>Jenis Kelamin:</strong>      <span><?php echo htmlspecialchars($data['jenis_kelamin']); ?></span>
                <strong>Agama:</strong>              <span><?php echo htmlspecialchars($data['agama']); ?></span>
                <strong>Sekolah Asal:</strong>       <span><?php echo htmlspecialchars($data['sekolah_asal']); ?></span>
                <strong>Alamat:</strong>             <span><?php echo nl2br(htmlspecialchars($data['alamat'])); ?></span>
            </div>
        </div>

        <div class="detail-section">
            <h3>Data Orang Tua</h3>
            <div class="detail-grid">
                <strong>Nama Ayah:</strong>          <span><?php echo htmlspecialchars($data['nama_ayah']); ?></span>
                <strong>No. Telepon Ayah:</strong>   <span><?php echo htmlspecialchars($data['telepon_ayah']); ?></span>
                <strong>Nama Ibu:</strong>           <span><?php echo htmlspecialchars($data['nama_ibu']); ?></span>
                <strong>No. Telepon Ibu:</strong>    <span><?php echo htmlspecialchars($data['telepon_ibu']); ?></span>
            </div>
        </div>

        <div class="detail-section">
            <div class="detail-grid">
                <strong>Tanggal Mendaftar:</strong> <span><?php echo date('d F Y \p\u\k\u\l H:i', strtotime($data['tanggal_daftar'])); ?></span>
            </div>
        </div>

    </div>
</body>
</html>