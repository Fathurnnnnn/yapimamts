<?php
require_once 'config.php';

// Ambil kata kunci pencarian dari URL, pastikan tidak kosong
$search_query = isset($_GET['query']) ? trim($_GET['query']) : '';

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian untuk "<?php echo htmlspecialchars($search_query); ?>" - MTS YAPIMA</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* CSS khusus untuk halaman hasil pencarian */
        .search-results-page {
            padding: 120px 20px 40px;
            min-height: 70vh;
        }
        .search-results-page h1 {
            text-align: center;
            margin-bottom: 10px;
        }
        .search-results-page .query-display {
            text-align: center;
            font-style: italic;
            color: #6c757d;
            margin-bottom: 40px;
        }
        .no-results {
            text-align: center;
            font-size: 1.2rem;
            color: #6c757d;
        }
    </style>
</head>
<body>

    <?php include 'header.php'; ?>

    <main class="search-results-page">
        <div class="container">
            <h1>Hasil Pencarian</h1>
            <p class="query-display">Menampilkan hasil untuk: "<?php echo htmlspecialchars($search_query); ?>"</p>

            <div class="grid-container">
                <?php
                // Hanya jalankan query jika kata kunci tidak kosong
                if (!empty($search_query)) {
                    // Siapkan query untuk mencari di judul ATAU konten berita
                    // Gunakan prepared statement untuk keamanan dari SQL Injection
                    $sql_query = "%" . $search_query . "%";
                    $stmt = $conn->prepare("SELECT * FROM berita WHERE judul LIKE ? OR konten LIKE ? ORDER BY tanggal_publish DESC");
                    $stmt->bind_param("ss", $sql_query, $sql_query);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0):
                        while($row = $result->fetch_assoc()):
                ?>
                            <div class="grid-item news-item">
                                <a href="detail_berita.php?id=<?php echo $row['id']; ?>">
                                    <img src="uploads/<?php echo htmlspecialchars($row['gambar']); ?>" alt="<?php echo htmlspecialchars($row['judul']); ?>">
                                </a>
                                <div class="news-content">
                                    <small><?php echo date('d F Y', strtotime($row['tanggal_publish'])); ?></small>
                                    <h3>
                                        <a href="detail_berita.php?id=<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['judul']); ?></a>
                                    </h3>
                                    <p><?php echo htmlspecialchars(substr($row['konten'], 0, 100)) . '...'; ?></p>
                                </div>
                            </div>
                <?php
                        endwhile;
                    else:
                        // Jika tidak ada hasil yang ditemukan
                        echo '<p class="no-results">Tidak ada berita yang cocok dengan kata kunci Anda.</p>';
                    endif;
                    $stmt->close();
                } else {
                    // Jika pengguna mengakses halaman tanpa kata kunci
                    echo '<p class="no-results">Silakan masukkan kata kunci pada kolom pencarian.</p>';
                }
                ?>
            </div>
        </div>
    </main>

    <?php include 'footer.php'; ?>

</body>
</html>