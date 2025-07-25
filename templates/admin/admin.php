<?php
// File: src/models/Admin.php

namespace App\models;

use App\Database;

class Admin {
    /**
     * Cari admin berdasarkan username.
     * Mengembalikan data admin jika ditemukan, atau false jika tidak.
     */
    public static function findByUsername($username) {
        $pdo = Database::getInstance()->getConnection();
        $stmt = $pdo->prepare("SELECT * FROM admin WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch();
    }
}
?>
