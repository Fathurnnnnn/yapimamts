<?php
use App\models\Berita;

$daftar_berita = Berita::findAll();
?>
<h2>Manajemen Berita</h2>
<a href="index.php?page=admin_berita_form" style="display:inline-block; margin-bottom: 20px; padding:10px 15px; background-color:#28a745; color:white; text-decoration:none; border-radius:4px;">+ Tambah Berita Baru</a>

<table border="1" cellpadding="10" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Judul</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($daftar_berita as $index => $berita): ?>
        <tr>
            <td><?php echo $index + 1; ?></td>
            <td><img src="uploads/<?php echo htmlspecialchars($berita['gambar']); ?>" alt="" width="100"></td>
            <td><?php echo htmlspecialchars($berita['judul']); ?></td>
            <td>
                <a href="index.php?page=admin_berita_form&id=<?php echo $berita['id']; ?>">Edit</a> |
                <a href="index.php?page=admin_berita_delete&id=<?php echo $berita['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?');">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>