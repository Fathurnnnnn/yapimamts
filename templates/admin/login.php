<?php
require_once '../config.php';

// Jika sudah login, redirect ke dasbor
if (isset($_SESSION['admin_logged_in'])) {
    header('Location: index.php');
    exit();
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT password FROM admin WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

  // ...
if ($result->num_rows == 1) {
    $admin = $result->fetch_assoc();

    // Ganti password_verify dengan perbandingan biasa
    if ($password == $admin['password']) { 
        // Jika password dari form SAMA DENGAN password di database
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $username;
        header('Location: index.php');
        exit();
    }
}
// Jika username tidak ditemukan atau password tidak cocok
$error = 'Username atau password salah!';
// ...
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body { display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #f0f2f5; }
        .login-container { padding: 40px; background: white; box-shadow: 0 4px 15px rgba(0,0,0,0.1); border-radius: 8px; text-align: center; width: 350px; }
        .login-container h2 { margin-bottom: 20px; }
        .login-container input { width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; }
        .login-container button { width: 100%; padding: 10px; background: var(--primary-color); color: white; border: none; border-radius: 4px; cursor: pointer; }
        .login-container .error { color: red; margin-bottom: 15px; }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login Admin</h2>
        <?php if ($error): ?><p class="error"><?php echo $error; ?></p><?php endif; ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>