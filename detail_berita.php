<?php
// Selalu panggil config di paling atas
require_once 'config.php';

// Cek apakah ada ID berita yang dikirim melalui URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    // Jika tidak ada ID, kembalikan ke halaman utama
    header('Location: index.php');
    exit();
}

$id_berita = $_GET['id'];

// Ambil data berita dari database berdasarkan ID
// Gunakan prepared statement untuk keamanan dari SQL Injection
$stmt = $conn->prepare("SELECT * FROM berita WHERE id = ?");
$stmt->bind_param("i", $id_berita);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    // Jika berita ditemukan, ambil datanya
    $berita = $result->fetch_assoc();
} else {
    // Jika berita tidak ditemukan, hentikan script dan tampilkan pesan
    die("Berita tidak ditemukan.");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Judul halaman dinamis sesuai judul berita -->
    <title><?php echo htmlspecialchars($berita['judul']); ?> - MTS YAPIMA</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* CSS tambahan khusus untuk halaman detail */
        .detail-container {
            padding: 120px 20px 40px;
            max-width: 800px;
            margin: auto;
        }
        .detail-container h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            color: var(--secondary-color);
        }
        .detail-container .meta {
            font-size: 0.9rem;
            color: #6c757d;
            margin-bottom: 25px;
        }

        /* PERUBAHAN DI SINI: Style untuk bingkai gambar */
        .detail-image-container {
            width: 100%;
            aspect-ratio: 16 / 9; /* Rasio bingkai 16:9 */
            background-color: #f0f2f5; /* Warna latar jika ada ruang kosong */
            border-radius: 8px;
            margin-bottom: 25px;
            overflow: hidden;
        }

        /* PERUBAHAN DI SINI: Style untuk gambar di dalam bingkai */
        .detail-image-container .detail-image {
            width: 100%;
            height: 100%;
            object-fit: contain; /* Memastikan seluruh gambar muat tanpa terpotong */
        }
        
        .detail-container .content {
            line-height: 1.8;
            font-size: 1.1rem;
            white-space: pre-wrap;
        }
        .back-link {
            display: inline-block;
            margin-top: 30px;
            text-decoration: none;
            color: var(--primary-color);
            font-weight: bold;
        }
    </style>
</head>
<body>

    <?php include 'header.php'; ?>

    <main class="detail-container">
        <!-- Judul Berita -->
        <h1><?php echo htmlspecialchars($berita['judul']); ?></h1>

        <!-- Info Tanggal -->
        <p class="meta">Dipublikasikan pada <?php echo date('d F Y', strtotime($berita['tanggal_publish'])); ?></p>
        
        <!-- Gambar Utama Berita -->
        <?php if (!empty($berita['gambar'])): ?>
            <!-- PERUBAHAN DI SINI: Gambar dibungkus dalam div container -->
            <div class="detail-image-container">
                <img src="uploads/<?php echo htmlspecialchars($berita['gambar']); ?>" alt="<?php echo htmlspecialchars($berita['judul']); ?>" class="detail-image">
            </div>
        <?php endif; ?>

        <!-- Konten Lengkap Berita -->
        <div class="content">
            <?php
            echo nl2br(htmlspecialchars($berita['konten'])); 
            ?>
        </div>

        <a href="index.php#berita" class="back-link">← Kembali ke Daftar Berita</a>
    </main>

    <?php include 'footer.php'; ?>

</body>
</html>