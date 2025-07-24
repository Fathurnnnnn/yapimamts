<?php
$page_title = 'Kelola Berita';
include 'admin_header.php';

$is_edit = false;
// Inisialisasi variabel
$id = ''; $judul = ''; $konten = ''; $gambar_lama = '';

if (isset($_GET['id'])) {
    $is_edit = true;
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM berita WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $berita = $result->fetch_assoc();
    $judul = $berita['judul'];
    $konten = $berita['konten'];
    $gambar_lama = $berita['gambar'];
}
?>
<div class="page-header">
    <h2><?php echo $is_edit ? 'Edit Berita' : 'Tambah Berita Baru'; ?></h2>
</div>

<form action="proses_berita.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="hidden" name="gambar_lama" value="<?php echo $gambar_lama; ?>">

    <div class="form-group">
        <label for="judul">Judul Berita</label>
        <input type="text" id="judul" name="judul" value="<?php echo htmlspecialchars($judul); ?>" required>
    </div>
    <div class="form-group">
        <label for="konten">Konten</label>
        <textarea id="konten" name="konten" required><?php echo htmlspecialchars($konten); ?></textarea>
    </div>
    <div class="form-group">
        <label for="gambar">Gambar</label>
        <input type="file" id="gambar" name="gambar" accept="image/*">
        <?php if ($is_edit && $gambar_lama): ?>
            <p style="margin-top:10px;"><img src="../uploads/<?php echo $gambar_lama; ?>" width="150"></p>
        <?php endif; ?>
    </div>

    <button type="submit" name="submit" class="btn">Simpan Berita</button>
    <a href="index.php" style="margin-left: 10px;">Batal</a>
</form>

<?php include 'admin_footer.php'; ?>