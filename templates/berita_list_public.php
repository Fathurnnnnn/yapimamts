<?php
use App\models\Berita;

$daftar_berita = Berita::findAll();
?>
<div style="max-width: 800px; margin: 20px auto; padding: 20px;">
    <h2>Berita Terbaru</h2>
    <hr>
    <?php foreach ($daftar_berita as $berita): ?>
        <div style="margin-bottom: 30px; border-bottom: 1px solid #eee; padding-bottom: 20px;">
            <h3><?php echo htmlspecialchars($berita['judul']); ?></h3>
            <?php if ($berita['gambar']): ?>
                <img src="uploads/<?php echo htmlspecialchars($berita['gambar']); ?>" alt="" style="width: 200px; float: left; margin-right: 15px;">
            <?php endif; ?>
            <p>
                <?php echo htmlspecialchars(substr($berita['isi'], 0, 250)); ?>...
            </p>
            <a href="index.php?page=berita_detail&id=<?php echo $berita['id']; ?>" style="display: inline-block; padding: 8px 12px; background-color: #007bff; color: white; text-decoration: none; border-radius: 4px;">
                Baca Selengkapnya
            </a>
            <div style="clear: both;"></div>
        </div>
    <?php endforeach; ?>
</div>