<?php
use App\models\Berita;


$berita = null;
$judul_halaman = 'Tambah Berita Baru';
// Jika ada ID di URL, berarti kita sedang mode edit
if (isset($_GET['id'])) {
    $berita = Berita::findById($_GET['id']);
    $judul_halaman = 'Edit Berita';
}

// Logika untuk memproses form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id']) && !empty($_POST['id'])) { // Mode Update
        Berita::update($_POST['id'], $_POST, $_FILES);
    } else { // Mode Create
        Berita::create($_POST, $_FILES);
    }
    header('Location: index.php?page=admin_berita_index');
    exit();
}
?>

<h2><?php echo $judul_halaman; ?></h2>

<form method="POST" action="index.php?page=admin_berita_form" enctype="multipart/form-data">
    <!-- Hidden input untuk menyimpan ID saat mode edit -->
    <input type="hidden" name="id" value="<?php echo $berita ? $berita['id'] : ''; ?>">
    
    <p>
        <label for="judul">Judul Berita:</label><br>
        <input type="text" id="judul" name="judul" value="<?php echo $berita ? htmlspecialchars($berita['judul']) : ''; ?>" required style="width: 98%; padding: 8px;">
    </p>
    <p>
        <label for="isi">Isi Berita:</label><br>
        <textarea id="isi" name="isi" rows="10" required style="width: 98%; padding: 8px;"><?php echo $berita ? htmlspecialchars($berita['isi']) : ''; ?></textarea>
    </p>
    <p>
        <label for="gambar">Gambar Unggulan:</label><br>
        <input type="file" id="gambar" name="gambar">
        <?php if ($berita && $berita['gambar']): ?>
            <br><small>Gambar saat ini: <?php echo $berita['gambar']; ?></small><br>
            <img src="uploads/<?php echo $berita['gambar']; ?>" width="150" alt="">
        <?php endif; ?>
    </p>
    <button type="submit">Simpan Berita</button>
</form>