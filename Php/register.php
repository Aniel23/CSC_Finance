<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <!-- Correct CSS link -->
    <link rel="stylesheet" href="../Css/register.css">
    <!-- Boxicons CDN for icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

<div class="main-container">

    <!-- LEFT PANEL -->
    <div class="side-panel">
        <h1>WELCOME!</h1>
        <p>Login using your Student ID to access the portal.</p>
        <a href="login.php" class="login-link">Back to Login</a>
    </div>

    <!-- LOGIN FORM -->
    <div class="form-box">
        <h2>Student Login</h2>

        <form>

            <div class="input-box">
                <input type="text" placeholder="Student ID" required>
                <i class="bx bx-id-card"></i>
            </div>

            <button type="submit" class="btn">Login</button>

        </form>
    </div>

</div>

<!-- Correct JS link -->
<script src="../Js/register.js"></script>

</body>
</html>


