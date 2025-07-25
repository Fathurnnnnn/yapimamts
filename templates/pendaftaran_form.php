<?php
use App\models\Pendaftar;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = Pendaftar::create($_POST);

    if ($result) {
        echo "<script>
                alert('Pendaftaran berhasil dikirim! Terima kasih.');
                window.location.href = 'index.php?page=beranda';
              </script>";
        exit();
    } else {
        echo "<script>
                alert('Maaf, terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
                window.history.back();
              </script>";
        exit();
    }
}
?>

<!-- --- BAGIAN TAMPILAN HTML --- -->
<div style="max-width: 700px; margin: 20px auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px;">
    <h2>Formulir Pendaftaran Siswa Baru</h2>
    <p>Silakan isi data di bawah ini dengan lengkap dan benar.</p>
    <hr>
    
    <form method="POST" action="index.php?page=pendaftaran">
        <p>
            <label for="nama_lengkap">Nama Lengkap:</label><br>
            <input type="text" id="nama_lengkap" name="nama_lengkap" required style="width: 98%; padding: 8px;">
        </p>
        <p>
            <label for="nisn">NISN:</label><br>
            <input type="text" id="nisn" name="nisn" required style="width: 98%; padding: 8px;">
        </p>
        <p>
            <label for="tempat_lahir">Tempat Lahir:</label><br>
            <input type="text" id="tempat_lahir" name="tempat_lahir" required style="width: 98%; padding: 8px;">
        </p>
        <p>
            <label for="tanggal_lahir">Tanggal Lahir:</label><br>
            <input type="date" id="tanggal_lahir" name="tanggal_lahir" required style="width: 98%; padding: 8px;">
        </p>
        <p>
            <label for="jenis_kelamin">Jenis Kelamin:</label><br>
            <select id="jenis_kelamin" name="jenis_kelamin" required style="width: 100%; padding: 8px;">
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </p>
        <p>
            <label for="agama">Agama:</label><br>
            <input type="text" id="agama" name="agama" required value="Islam" style="width: 98%; padding: 8px;">
        </p>
        <p>
            <label for="alamat">Alamat Lengkap:</label><br>
            <textarea id="alamat" name="alamat" required rows="4" style="width: 98%; padding: 8px;"></textarea>
        </p>
        <p>
            <label for="sekolah_asal">Sekolah Asal:</label><br>
            <input type="text" id="sekolah_asal" name="sekolah_asal" required style="width: 98%; padding: 8px;">
        </p>
        
        <h3>Data Orang Tua</h3>
        <p>
            <label for="nama_ayah">Nama Ayah:</label><br>
            <input type="text" id="nama_ayah" name="nama_ayah" required style="width: 98%; padding: 8px;">
        </p>
        <p>
            <label for="telepon_ayah">Nomor Telepon Ayah:</label><br>
            <input type="tel" id="telepon_ayah" name="telepon_ayah" required style="width: 98%; padding: 8px;">
        </p>
        <p>
            <label for="nama_ibu">Nama Ibu:</label><br>
            <input type="text" id="nama_ibu" name="nama_ibu" required style="width: 98%; padding: 8px;">
        </p>
        <p>
            <label for="telepon_ibu">Nomor Telepon Ibu:</label><br>
            <input type="tel" id="telepon_ibu" name="telepon_ibu" required style="width: 98%; padding: 8px;">
        </p>
        
        <hr>
        <button type="submit" style="width: 100%; padding: 12px; font-size: 16px; background-color: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer;">
            Daftar Sekarang
        </button>
    </form>
</div>