<?php
// Menggunakan header admin terpusat yang sudah memiliki path benar ke config.php
$page_title = 'Manajemen Berita';
include 'admin_header.php';

// Ambil semua berita dari database
$result = $conn->query("SELECT * FROM berita ORDER BY tanggal_publish DESC");
?>
<div class="page-header">
    <h2>Daftar Berita</h2>
    <a href="form_berita.php" class="btn">Tambah Berita Baru</a>
</div>

<div class="table-wrapper">
    <table>
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td>
                        <?php if (!empty($row['gambar'])): ?>
                            <img src="../uploads/<?php echo htmlspecialchars($row['gambar']); ?>" alt="Gambar Berita">
                        <?php else: ?>
                            <span>Tidak ada gambar</span>
                        <?php endif; ?>
                    </td>
                    <td><?php echo htmlspecialchars($row['judul']); ?></td>
                    <td><?php echo date('d M Y', strtotime($row['tanggal_publish'])); ?></td>
                    <td>
                        <a href="form_berita.php?id=<?php echo $row['id']; ?>">Edit</a> | 
                        <a href="proses_berita.php?aksi=hapus&id=<?php echo $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus berita ini?')" style="color:red;">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="4" style="text-align:center;">Belum ada berita.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php include 'admin_footer.php'; ?>```