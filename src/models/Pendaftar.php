<?php
// File: src/models/Pendaftar.php

namespace App\models;

// Beritahu class ini di mana menemukan Class Database dan PDOException
use App\Database;
use PDOException;

class Pendaftar {
    
    public static function findAll() {
        $pdo = Database::getInstance()->getConnection();
        $stmt = $pdo->prepare("SELECT * FROM calon_siswa ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function create(array $data) {
        $pdo = Database::getInstance()->getConnection();
        $sql = "INSERT INTO calon_siswa 
                (nama_lengkap, nisn, tempat_lahir, tanggal_lahir, jenis_kelamin, agama, alamat, sekolah_asal, nama_ayah, telepon_ayah, nama_ibu, telepon_ibu) 
                VALUES 
                (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                $data['nama_lengkap'],
                $data['nisn'],
                $data['tempat_lahir'],
                $data['tanggal_lahir'],
                $data['jenis_kelamin'],
                $data['agama'],
                $data['alamat'],
                $data['sekolah_asal'],
                $data['nama_ayah'],
                $data['telepon_ayah'],
                $data['nama_ibu'],
                $data['telepon_ibu']
            ]);
            return true;
        } catch (PDOException $e) {
            // Anda bisa menambahkan logging error di sini jika perlu
            return false;
        }
    }
}
?>