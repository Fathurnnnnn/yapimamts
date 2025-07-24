<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MTS YAPIMA - School Landing Page</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <?php include 'header.php'; ?>

    <!-- Hero Section -->
    <section id="beranda" class="hero">
        <div class="hero-text">
            <h1>Selamat Datang di <span>MTS YAPIMA</span></h1>
            <p>Mencetak Generasi Unggul, Berakhlak Mulia, dan Berwawasan Global.</p>
        </div>
    </section>
    
    <main>
        <!-- Profil Sekolah -->
        <section id="profil" class="content-section">
            <div class="container">
                <div class="container-flex">
                    <div class="image-container">
                    <img src="images/yapima.jpg" alt="Suasana Sekolah">
                    </div>
                    <div class="text-container">
                        <h2>Profil Sekolah</h2>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. </p>
                        <h3>Sambutan Kepala Sekolah</h3>
                        <div class="quote">tor eu, consequat vitae, eleifend ac, enim. Aliquam lorm rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Done"</p>
                            <strong>H. Muhammad Abdullah, S.Pd., M.Pd.</strong>
                            <small>Kepala Sekolah MTS YAPIMA</small>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Visi & Misi -->
        <section id="visi-misi" class="colored-section">
            <div class="container">
                <h2>Visi & Misi</h2>
                <div class="visi-misi-container">
                    <div class="card visi">
                        <h3>Visi</h3>
                        <p>"Menjadi lembaga pendidikan islam terdepan..."</p>
                    </div>
                    <div class="card misi">
                        <h3>Misi</h3>
                        <ul>
                            <li>Menyelenggarakan pendidikan yang seimbang...</li>
                            <li>Mengembangkan potensi akademik dan non-akademik...</li>
                            <li>Membentuk pribadi siswa yang berakhlak mulia...</li>
                            <li>Menciptakan lingkungan sekolah yang aman...</li>
                            <li>Menjalin kerja sama yang harmonis...</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Fasilitas Sekolah -->
        <section id="fasilitas" class="content-section">
            <div class="container">
                <h2>Fasilitas Sekolah</h2>
                <p class="section-subtitle">Kami menyediakan fasilitas terbaik...</p>
                <div class="grid-container">
                    <div class="grid-item"><div class="grid-item-image-container"><img src="images/placeholder-fasilitas1.jpg" alt="Perpustakaan"></div><h3>Perpustakaan Modern</h3><p>Koleksi buku lengkap...</p></div>
                    <div class="grid-item"><div class="grid-item-image-container"><img src="images/placeholder-fasilitas2.jpg" alt="Lab Komputer"></div><h3>Laboratorium Komputer</h3><p>Dilengkapi perangkat komputer terkini...</p></div>
                    <div class="grid-item"><div class="grid-item-image-container"><img src="images/placeholder-fasilitas3.jpg" alt="Lab IPA"></div><h3>Laboratorium IPA</h3><p>Fasilitas lengkap untuk praktikum...</p></div>
                    <div class="grid-item"><div class="grid-item-image-container"><img src="images/placeholder-fasilitas4.jpg" alt="Lapangan"></div><h3>Lapangan Olahraga</h3><p>Area olahraga outdoor yang luas...</p></div>
                    <div class="grid-item"><div class="grid-item-image-container"><img src="images/placeholder-fasilitas5.jpg" alt="Musholla"></div><h3>Musholla yang Nyaman</h3><p>Tempat ibadah yang bersih dan nyaman...</p></div>
                    <div class="grid-item"><div class="grid-item-image-container"><img src="images/placeholder-fasilitas6.jpg" alt="Kantin"></div><h3>Kantin Sehat</h3><p>Menyediakan berbagai pilihan makanan...</p></div>
                </div>
            </div>
        </section>

        <!-- Ekstrakurikuler -->
        <section id="ekskul" class="content-section">
            <div class="container">
                <h2>Ekstrakurikuler</h2>
                <p class="section-subtitle">Mengembangkan bakat, minat, dan soft skills...</p>
                <div class="grid-container">
                    <div class="grid-item"><div class="grid-item-image-container"><img src="pramuka.jpg" alt="Pramuka"></div><h3>Pramuka</h3><p>Membentuk karakter mandiri...</p></div>
                    <div class="grid-item"><div class="grid-item-image-container"><img src="yapima.jpg" alt="PMR"></div><h3>PMR</h3><p>Mengajarkan dasar-dasar pertolongan pertama...</p></div>
                    <div class="grid-item"><div class="grid-item-image-container"><img src="yapima.jpg" alt="Basket"></div><h3>Klub Olahraga Basket</h3><p>Mengembangkan bakat dan kerja sama tim...</p></div>
                    <div class="grid-item"><div class="grid-item-image-container"><img src="pramuka.jpg" alt="KIR"></div><h3>KIR</h3><p>Wadah bagi siswa yang memiliki minat...</p></div>
                    <div class="grid-item"><div class="grid-item-image-container"><img src="pramuka.jpg" alt="Musik"></div><h3>Seni Musik dan Tari</h3><p>Mengasah kreativitas dan bakat siswa...</p></div>
                    <div class="grid-item"><div class="grid-item-image-container"><img src="pramuka.jpg" alt="Tahfidz"></div><h3>Tahfidz Al-Qur'an</h3><p>Program bimbingan intensif...</p></div>
                </div>
            </div>
        </section>
        
        <!-- Berita & Pengumuman -->
        <section id="berita" class="content-section">
            <div class="container">
                <h2>Berita & Pengumuman</h2>
                <p class="section-subtitle">Ikuti terus informasi dan kegiatan terbaru...</p>
                <div class="grid-container">
                    <?php
                    $result = $conn->query("SELECT * FROM berita ORDER BY tanggal_publish DESC LIMIT 3"); // Hanya tampilkan 3 berita
                    if ($result->num_rows > 0):
                        while($row = $result->fetch_assoc()):
                    ?>
                            <div class="grid-item news-item">
                                <a href="detail_berita.php?id=<?php echo $row['id']; ?>">
                                    <div class="news-image-container">
                                        <img src="uploads/<?php echo htmlspecialchars($row['gambar']); ?>" alt="...">
                                    </div>
                                </a>
                                <div class="news-content">
                                    <small><?php echo date('d F Y', strtotime($row['tanggal_publish'])); ?></small>
                                    <h3><a href="detail_berita.php?id=<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['judul']); ?></a></h3>
                                    <p><?php echo htmlspecialchars(substr($row['konten'], 0, 100)) . '...'; ?></p>
                                </div>
                            </div>
                    <?php
                        endwhile;
                    else:
                        echo "<p>Belum ada berita yang dipublikasikan.</p>";
                    endif;
                    ?>
                </div>
            </div>
        </section>

        <!-- Lokasi Sekolah -->
        <section id="lokasi" class="content-section">
             <div class="container">
                <h2>Lokasi Sekolah</h2>
                <p class="section-subtitle">Temukan kami dengan mudah...</p>
                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?..." width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </section>
    </main>

    <?php include 'footer.php'; ?>

    <script src="js/script.js"></script>
</body>
</html>