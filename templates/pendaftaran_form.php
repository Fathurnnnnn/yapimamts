<?php
// BAGIAN LOGIKA PEMROSESAN FORM
// Variabel $koneksi sudah tersedia dari public/index.php, jadi tidak perlu require 'config.php' lagi.

// Hanya jalankan kode pemrosesan jika form dikirim (metode POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil semua data dari form untuk keamanan
    $nama_lengkap = mysqli_real_escape_string($koneksi, $_POST['nama_lengkap']);
    $nisn = mysqli_real_escape_string($koneksi, $_POST['nisn']);
    $tempat_lahir = mysqli_real_escape_string($koneksi, $_POST['tempat_lahir']);
    $tanggal_lahir = mysqli_real_escape_string($koneksi, $_POST['tanggal_lahir']);
    $jenis_kelamin = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
    $agama = mysqli_real_escape_string($koneksi, $_POST['agama']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $sekolah_asal = mysqli_real_escape_string($koneksi, $_POST['sekolah_asal']);
    $nama_ayah = mysqli_real_escape_string($koneksi, $_POST['nama_ayah']);
    $telepon_ayah = mysqli_real_escape_string($koneksi, $_POST['telepon_ayah']);
    $nama_ibu = mysqli_real_escape_string($koneksi, $_POST['nama_ibu']);
    $telepon_ibu = mysqli_real_escape_string($koneksi, $_POST['telepon_ibu']);

    // Siapkan query untuk menyimpan data (Menggunakan variabel $koneksi)
    // Perhatikan: Jika sebelumnya Anda menggunakan $conn, sekarang harus diganti menjadi $koneksi
    $query = "INSERT INTO calon_siswa 
              (nama_lengkap, nisn, tempat_lahir, tanggal_lahir, jenis_kelamin, agama, alamat, sekolah_asal, nama_ayah, telepon_ayah, nama_ibu, telepon_ibu) 
              VALUES 
              ('$nama_lengkap', '$nisn', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$agama', '$alamat', '$sekolah_asal', '$nama_ayah', '$telepon_ayah', '$nama_ibu', '$telepon_ibu')";

    $result = mysqli_query($koneksi, $query);

    // Eksekusi query dan berikan pesan
    if ($result) {
        // Jika berhasil, tampilkan pesan dan arahkan ke halaman utama
        echo "<script>
                alert('Pendaftaran berhasil dikirim! Terima kasih.');
                window.location.href = 'index.php?page=beranda';
              </script>";
        exit(); // Penting untuk menghentikan eksekusi script setelah redirect
    } else {
        // Jika gagal, tampilkan pesan error
        echo "<script>
                alert('Maaf, terjadi kesalahan. Silakan coba lagi. Error: " . mysqli_error($koneksi) . "');
                window.history.back();
              </script>";
        exit();
    }
}
?>

<!-- BAGIAN TAMPILAN FORM HTML -->
<!-- Pastikan action pada form sudah benar -->
<form method="POST" action="index.php?page=pendaftaran">
    
    <h2>Formulir Pendaftaran Siswa Baru</h2>
    <p>Silakan isi data di bawah ini dengan lengkap dan benar.</p>

    <!-- 
    ====================================================================
    !!! PENTING: PASTE KODE HTML FORMULIR LAMA ANDA DI SINI !!!
    (Mulai dari input nama lengkap, NISN, sampai tombol submit)
    ====================================================================
    -->

    <!-- Contoh: -->
    <div class="form-group">
        <label for="nama_lengkap">Nama Lengkap:</label>
        <input type="text" id="nama_lengkap" name="nama_lengkap" required>
    </div>

    <div class="form-group">
        <label for="nisn">NISN:</label>
        <input type="text" id="nisn" name="nisn" required>
    </div>

    <!-- ... (lanjutkan dengan field form lainnya) ... -->

    <button type="submit">Daftar Sekarang</button>

</form>