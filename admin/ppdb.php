<?php
$page_title = 'Kelola Informasi PPDB';
include 'admin_header.php';

$result = $conn->query("SELECT * FROM ppdb_info WHERE id = 1");
$info = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Proses update data
    $status = $_POST['status'];
    $gelombang = $_POST['gelombang'];
    $jadwal = $_POST['jadwal'];
    $alur = $_POST['alur_pendaftaran'];
    $syarat = $_POST['syarat_pendaftaran'];
    $kontak = $_POST['kontak_person'];

    $stmt = $conn->prepare("UPDATE ppdb_info SET status=?, gelombang=?, jadwal=?, alur_pendaftaran=?, syarat_pendaftaran=?, kontak_person=? WHERE id=1");
    $stmt->bind_param("ssssss", $status, $gelombang, $jadwal, $alur, $syarat, $kontak);
    if ($stmt->execute()) {
        echo "<script>alert('Informasi PPDB berhasil diperbarui.'); window.location.href=window.location.href;</script>";
        exit();
    } else {
        echo "<script>alert('Gagal memperbarui data.');</script>";
    }
}
?>
<div class="page-header">
    <h2>Informasi Pendaftaran Siswa Baru (PPDB)</h2>
</div>

<form method="POST">
    <div class="form-group">
        <label for="status">Status Pendaftaran</label>
        <select id="status" name="status">
            <option value="Buka" <?php echo ($info['status'] == 'Buka') ? 'selected' : ''; ?>>Buka</option>
            <option value="Tutup" <?php echo ($info['status'] == 'Tutup') ? 'selected' : ''; ?>>Tutup</option>
        </select>
    </div>
    <div class="form-group">
        <label for="gelombang">Gelombang</label>
        <input type="text" id="gelombang" name="gelombang" value="<?php echo htmlspecialchars($info['gelombang']); ?>" required>
    </div>
    <div class="form-group">
        <label for="jadwal">Jadwal Pendaftaran</label>
        <input type="text" id="jadwal" name="jadwal" value="<?php echo htmlspecialchars($info['jadwal']); ?>" required>
    </div>
    <div class="form-group">
        <label for="alur_pendaftaran">Alur Pendaftaran (Gunakan Enter untuk baris baru)</label>
        <textarea id="alur_pendaftaran" name="alur_pendaftaran" required><?php echo htmlspecialchars($info['alur_pendaftaran']); ?></textarea>
    </div>
    <div class="form-group">
        <label for="syarat_pendaftaran">Syarat Pendaftaran (Gunakan Enter untuk baris baru)</label>
        <textarea id="syarat_pendaftaran" name="syarat_pendaftaran" required><?php echo htmlspecialchars($info['syarat_pendaftaran']); ?></textarea>
    </div>
    <div class="form-group">
        <label for="kontak_person">Kontak Person</label>
        <input type="text" id="kontak_person" name="kontak_person" value="<?php echo htmlspecialchars($info['kontak_person']); ?>" required>
    </div>
    
    <button type="submit" class="btn">Simpan Perubahan</button>
</form>

<?php include 'admin_footer.php'; ?>