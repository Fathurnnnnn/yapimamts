<?php
use App\models\Pendaftar;

$semua_pendaftar = Pendaftar::findAll();
?>

<h2>Data Pendaftar</h2>
<p>Berikut adalah daftar calon siswa yang telah mendaftar.</p>

<table border="1" cellpadding="10" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>NISN</th>
            <th>Jenis Kelamin</th>
            <th>Sekolah Asal</th>
            <th>Telepon Ayah</th>
            <!-- Tambah kolom lain jika perlu -->
        </tr>
    </thead>
    <tbody>
        <?php if (count($semua_pendaftar) > 0): ?>
            <?php foreach ($semua_pendaftar as $index => $pendaftar): ?>
                <tr>
                    <td><?php echo $index + 1; ?></td>
                    <td><?php echo htmlspecialchars($pendaftar['nama_lengkap']); ?></td>
                    <td><?php echo htmlspecialchars($pendaftar['nisn']); ?></td>
                    <td><?php echo htmlspecialchars($pendaftar['jenis_kelamin']); ?></td>
                    <td><?php echo htmlspecialchars($pendaftar['sekolah_asal']); ?></td>
                    <td><?php echo htmlspecialchars($pendaftar['telepon_ayah']); ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" style="text-align: center;">Belum ada data pendaftar.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>