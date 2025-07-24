<?php
// File: templates/admin/login_form.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Username & password sederhana. Nanti bisa dikembangkan dari database.
    $admin_user = 'admin';
    $admin_pass = 'admin123'; // Ganti dengan password yang lebih aman

    if ($_POST['username'] === $admin_user && $_POST['password'] === $admin_pass) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $_POST['username'];
        header('Location: index.php?page=admin_dashboard');
        exit();
    } else {
        $error_message = "Username atau password salah!";
    }
}
?>
<div style="width: 350px; margin: 100px auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
    <h2 style="text-align: center;">Login Admin</h2>
    <hr>
    <?php if (isset($error_message)): ?>
        <p style="color: red; text-align: center;"><?php echo $error_message; ?></p>
    <?php endif; ?>
    <form method="POST" action="index.php?page=admin_login">
        <div style="margin-bottom: 15px;">
            <label for="username">Username:</label><br>
            <input type="text" name="username" id="username" required style="width: 95%; padding: 8px;">
        </div>
        <div style="margin-bottom: 20px;">
            <label for="password">Password:</label><br>
            <input type="password" name="password" id="password" required style="width: 95%; padding: 8px;">
        </div>
        <button type="submit" style="width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;">Login</button>
    </form>
</div>
