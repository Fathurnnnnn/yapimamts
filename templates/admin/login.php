<?php
// File: templates/admin/login_form.php

// Gunakan Class Admin yang sudah di-autoload
use App\models\Admin;

// Jika sudah login, langsung tendang ke dashboard
if (isset($_SESSION['admin_logged_in'])) {
    header('Location: index.php?page=admin_dashboard');
    exit();
}

$error_message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cari admin di database menggunakan Model kita
    $admin = Admin::findByUsername($username);

    // Cek apakah admin ditemukan DAN passwordnya cocok (sudah di-hash)
    if ($admin && password_verify($password, $admin['password'])) {
        // Jika berhasil, buat session
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $admin['username'];
        
        // Arahkan ke dashboard admin dengan URL yang benar
        header('Location: index.php?page=admin_dashboard');
        exit();
    } else {
        // Jika gagal, siapkan pesan error
        $error_message = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <style>
        body { font-family: Arial, sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #f0f2f5; margin:0; }
        .login-container { padding: 40px; background: white; box-shadow: 0 4px 15px rgba(0,0,0,0.1); border-radius: 8px; text-align: center; width: 350px; }
        .login-container h2 { margin-bottom: 20px; }
        .login-container input { box-sizing: border-box; width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; }
        .login-container button { width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; }
        .login-container .error { color: red; margin-bottom: 15px; }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login Admin</h2>
        <?php if ($error_message): ?><p class="error"><?php echo $error_message; ?></p><?php endif; ?>
        <form method="POST" action="index.php?page=admin_login">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>