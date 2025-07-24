<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil semua data dari form
    $nama_lengkap = $_POST['nama_lengkap'];
    $nisn = $_POST['nisn'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $alamat = $_POST['alamat'];
    $sekolah_asal = $_POST['sekolah_asal'];
    $nama_ayah = $_POST['nama_ayah'];
    $telepon_ayah = $_POST['telepon_ayah'];
    $nama_ibu = $_POST['nama_ibu'];
    $telepon_ibu = $_POST['telepon_ibu'];

    // Siapkan query untuk menyimpan data
    $stmt = $conn->prepare("INSERT INTO calon_siswa (nama_lengkap, nisn, tempat_lahir, tanggal_lahir, jenis_kelamin, agama, alamat, sekolah_asal, nama_ayah, telepon_ayah, nama_ibu, telepon_ibu) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssss", $nama_lengkap, $nisn, $tempat_lahir, $tanggal_lahir, $jenis_kelamin, $agama, $alamat, $sekolah_asal, $nama_ayah, $telepon_ayah, $nama_ibu, $telepon_ibu);

    // Eksekusi query dan berikan pesan
    if ($stmt->execute()) {
        echo "<script>
                alert('Pendaftaran berhasil dikirim! Terima kasih telah mendaftar di MTS YAPIMA. Kami akan segera menghubungi Anda untuk informasi selanjutnya.');
                window.location.href = 'ppdb.php';
              </script>";
    } else {
        echo "<script>
                alert('Maaf, terjadi kesalahan. Silakan coba lagi.');
                window.history.back();
              </script>";
    }
    $stmt->close();
    $conn->close();
}
?>