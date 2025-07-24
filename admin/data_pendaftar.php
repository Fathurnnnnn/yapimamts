<?php
$page_title = 'Data Pendaftar Siswa Baru'; // Judul Halaman
include 'admin_header.php'; // Panggil header terpusat

// Mengambil semua kolom data dari tabel calon_siswa
$result = $conn->query("SELECT * FROM calon_siswa ORDER BY tanggal_daftar DESC");
?>
<!-- PERUBAHAN DI SINI: Menambahkan CSS yang tepat untuk tabel -->
<style>
    .admin-content {
        max-width: 95%; /* Lebarkan kontainer agar tabel muat lebih banyak */
    }
    .table-wrapper { 
        overflow-x: auto; /* Kunci untuk scroll horizontal */
        border: 1px solid #ddd;
        border-radius: 5px;
    }
    table { 
        width: 100%; 
        min-width: 1600px; /* Lebar minimum tabel */
        border-collapse: collapse; 
    }
    th, td { 
        padding: 12px 15px; /* Memberi ruang napas di dalam sel */
        border: 1px solid #ddd; /* Garis pemisah antar sel */
        text-align: left; 
        vertical-align: middle; 
        white-space: nowrap; /* Mencegah teks turun baris, kecuali alamat */
    }
    th { 
        background-color: #f2f2f2; 
        font-weight: bold;
    }
    /* Mengizinkan kolom alamat untuk turun baris jika terlalu panjang */
    td.alamat, th.alamat {
        white-space: normal;
        min-width: 250px;
    }
    /* Memberi warna selang-seling agar mudah dibaca */
    tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }
</style>

<div class="page-header">
    <h2>Data Pendaftar Siswa Baru</h2>
</div>
        
<div class="table-wrapper">
    <table>
        <thead>
            <tr>
                <th>Nama Lengkap</th>
                <th>NISN</th>
                <th>Jenis Kelamin</th>
                <th>Tempat, Tgl Lahir</th>
                <th class="alamat">Alamat</th>
                <th>Sekolah Asal</th>
                <th>Nama Ayah</th>
                <th>Telepon Ayah</th>
                <th>Nama Ibu</th>
                <th>Telepon Ibu</th>
                <th>Tanggal Daftar</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['nama_lengkap']); ?></td>
                    <td><?php echo htmlspecialchars($row['nisn']); ?></td>
                    <td><?php echo htmlspecialchars($row['jenis_kelamin']); ?></td>
                    <td><?php echo htmlspecialchars($row['tempat_lahir']) . ', ' . date('d-m-Y', strtotime($row['tanggal_lahir'])); ?></td>
                    <td class="alamat"><?php echo htmlspecialchars($row['alamat']); ?></td>
                    <td><?php echo htmlspecialchars($row['sekolah_asal']); ?></td>
                    <td><?php echo htmlspecialchars($row['nama_ayah']); ?></td>
                    <td><?php echo htmlspecialchars($row['telepon_ayah']); ?></td>
                    <td><?php echo htmlspecialchars($row['nama_ibu']); ?></td>
                    <td><?php echo htmlspecialchars($row['telepon_ibu']); ?></td>
                    <td><?php echo date('d M Y H:i', strtotime($row['tanggal_daftar'])); ?></td>
                </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="11" style="text-align:center;">Belum ada pendaftar.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php include 'admin_footer.php'; // Panggil footer terpusat ?>