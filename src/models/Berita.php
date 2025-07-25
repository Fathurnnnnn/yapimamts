<?php
// File: src/models/Berita.php

namespace App\models;

// Beritahu class ini di mana menemukan Class Database
use App\Database;
use PDOException; // Tambahkan ini untuk menangani error saat upload

class Berita {

    // Mengambil semua berita
    public static function findAll() {
        $pdo = Database::getInstance()->getConnection();
        $stmt = $pdo->prepare("SELECT * FROM berita ORDER BY created_at DESC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Mengambil satu berita berdasarkan ID
    public static function findById($id) {
        $pdo = Database::getInstance()->getConnection();
        $stmt = $pdo->prepare("SELECT * FROM berita WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    // Membuat berita baru
    public static function create($data, $file) {
        $pdo = Database::getInstance()->getConnection();
        $gambar = self::uploadGambar($file); // Panggil fungsi upload

        $sql = "INSERT INTO berita (judul, isi, gambar) VALUES (?, ?, ?)";
        
        try {
            $stmt = $pdo->prepare($sql);
            return $stmt->execute([$data['judul'], $data['isi'], $gambar]);
        } catch (PDOException $e) {
            // Bisa ditambahkan log error di sini jika perlu
            return false;
        }
    }

    // Mengupdate berita
    public static function update($id, $data, $file) {
        $pdo = Database::getInstance()->getConnection();
        $gambar = self::uploadGambar($file);
        
        try {
            // Jika tidak ada gambar baru yang diupload, jangan update kolom gambar
            if ($gambar) {
                $sql = "UPDATE berita SET judul = ?, isi = ?, gambar = ? WHERE id = ?";
                $stmt = $pdo->prepare($sql);
                return $stmt->execute([$data['judul'], $data['isi'], $gambar, $id]);
            } else {
                $sql = "UPDATE berita SET judul = ?, isi = ? WHERE id = ?";
                $stmt = $pdo->prepare($sql);
                return $stmt->execute([$data['judul'], $data['isi'], $id]);
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    // Menghapus berita
    public static function delete($id) {
        $pdo = Database::getInstance()->getConnection();
        
        // Hapus juga file gambar dari server
        $berita = self::findById($id);
        if ($berita && $berita['gambar']) {
            $pathGambar = dirname(__DIR__, 2) . '/public/uploads/' . $berita['gambar'];
            if (file_exists($pathGambar)) {
                unlink($pathGambar);
            }
        }
        
        $sql = "DELETE FROM berita WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$id]);
    }
    
    // Fungsi helper untuk upload gambar
    private static function uploadGambar($file) {
        if (isset($file['gambar']) && $file['gambar']['error'] === UPLOAD_ERR_OK) {
            // Menggunakan path yang lebih robust
            $uploadDir = dirname(__DIR__, 2) . '/public/uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true); // Buat folder jika belum ada
            }
            $fileName = time() . '_' . basename($file['gambar']['name']);
            move_uploaded_file($file['gambar']['tmp_name'], $uploadDir . $fileName);
            return $fileName;
        }
        return null;
    }
}
?>