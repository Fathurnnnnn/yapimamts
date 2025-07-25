<?php
use App\models\Berita;

// Ambil ID dari URL, pastikan itu angka
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    // Jika ID tidak valid, tampilkan error atau arahkan ke halaman lain
    echo "<h1>Berita tidak ditemukan!</h1>";
    return;
}

$berita = Berita::findById($id);
?>

<div style="max-width: 800px; margin: 20px auto; padding: 20px;">
    <?php if ($berita): ?>
        <h1><?php echo htmlspecialchars($berita['judul']); ?></h1>
        <p style="color: #666;">Dipublikasikan pada: <?php echo date('d F Y', strtotime($berita['created_at'])); ?></p>
        <hr>
        <?php if ($berita['gambar']): ?>
            <img src="uploads/<?php echo htmlspecialchars($berita['gambar']); ?>" alt="Gambar Berita" style="width: 100%; max-width: 600px; margin-bottom: 20px;">
        <?php endif; ?>
        
        <div style="line-height: 1.6;">
            <?php echo nl2br(htmlspecialchars($berita['isi'])); // nl2br untuk mengubah baris baru menjadi tag <br> ?>
        </div>
    <?php else: ?>
        <h1>404 - Berita Tidak Ditemukan</h1>
        <p>Maaf, berita yang Anda cari tidak ada atau telah dihapus.</p>
    <?php endif; ?>
    <br>
    <a href="index.php?page=berita_list">Kembali ke Daftar Berita</a>
</div>