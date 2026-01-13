<?php
session_start();

// Admin credentials
$admin_email = "admin@gmail.com";
$admin_password = "Admin@123";

// Admin Login
if(isset($_POST['admin_login'])){
    $email = $_POST['admin_email'];
    $password = $_POST['admin_password'];

    if($email === $admin_email && $password === $admin_password){
        $_SESSION['user_role'] = 'admin';
        $_SESSION['user_email'] = $admin_email;
        $_SESSION['user_name'] = "Admin";
        header("Location: homepage.php");
        exit;
    } else {
        echo "<script>alert('Invalid admin credentials!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Finance Portal</title>
    
    <!-- CORRECT CSS PATH -->
    <link rel="stylesheet" href="../Css/login.css">
</head>

<body>

<!-- Updated Layout for New UI -->
<div class="login-container">

    <!-- Left Side Panel -->
    <div class="side-panel">
        <h1>Welcome Back!</h1>
        <p>Access your Finance Portal securely.<br>Manage, monitor, and maintain your system.</p>
    </div>

    <!-- Right Form Box -->
    <div class="form-box">
        <h2>Admin Login</h2>

        <form method="POST">
            <div class="input-box">
                <input type="email" name="admin_email" placeholder="Admin Email" required>
            </div>

            <div class="input-box">
                <input type="password" name="admin_password" placeholder="Password" required>
            </div>

            <button type="submit" name="admin_login" class="btn">Login</button>
        </form>

        <p class="switch-text">
            Not a user?
            <a href="register.php">Register as Student</a>
        </p>
    </div>

</div>

<!-- CORRECT JS PATH -->
<script src="../Js/login.js"></script>

</body>
</html>

