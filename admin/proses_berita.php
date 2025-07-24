<?php
require_once '../config.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit();
}

// Proses Hapus
if (isset($_GET['aksi']) && $_GET['aksi'] == 'hapus') {
    $id = $_GET['id'];

    // Ambil nama file gambar untuk dihapus dari server
    $stmt_select = $conn->prepare("SELECT gambar FROM berita WHERE id = ?");
    $stmt_select->bind_param("i", $id);
    $stmt_select->execute();
    $result = $stmt_select->get_result();
    $row = $result->fetch_assoc();
    $gambar_lama = $row['gambar'];

    // Hapus file gambar jika ada
    if ($gambar_lama && file_exists("../uploads/" . $gambar_lama)) {
        unlink("../uploads/" . $gambar_lama);
    }

    // Hapus data dari database
    $stmt_delete = $conn->prepare("DELETE FROM berita WHERE id = ?");
    $stmt_delete->bind_param("i", $id);
    $stmt_delete->execute();
    
    header('Location: index.php');
    exit();
}

// Proses Tambah / Edit
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $konten = $_POST['konten'];
    $gambar_lama = $_POST['gambar_lama'];

    $nama_gambar = $gambar_lama;

    // Cek apakah ada file gambar baru yang diupload
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $target_dir = "../uploads/";
        // Buat nama file unik untuk menghindari tumpukan
        $nama_gambar = time() . '_' . basename($_FILES["gambar"]["name"]);
        $target_file = $target_dir . $nama_gambar;

        // Pindahkan file yang diupload ke folder uploads
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            // Hapus gambar lama jika ada dan jika ini adalah proses edit
            if ($id && $gambar_lama && file_exists($target_dir . $gambar_lama)) {
                unlink($target_dir . $gambar_lama);
            }
        } else {
            // Gagal upload
            $nama_gambar = $gambar_lama; // Kembalikan ke gambar lama jika gagal
        }
    }

    if ($id) {
        // Update data
        $stmt = $conn->prepare("UPDATE berita SET judul = ?, konten = ?, gambar = ? WHERE id = ?");
        $stmt->bind_param("sssi", $judul, $konten, $nama_gambar, $id);
    } else {
        // Insert data baru
        $stmt = $conn->prepare("INSERT INTO berita (judul, konten, gambar) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $judul, $konten, $nama_gambar);
    }

    if ($stmt->execute()) {
        header('Location: index.php');
    } else {
        echo "Error: " . $stmt->error;
    }
    exit();
}
?>