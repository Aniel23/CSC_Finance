<?php
session_start();

// Example user role (replace with DB later)
$user_role = "admin"; // or "student"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSC: Finance of Colegio de Naujan</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- CSS CONNECTOR -->
    <link rel="stylesheet" href="../Css/homepage.css">
</head>
<body>

<header class="top-header">
    <div class="logo-area">
        <h1>CSC: <span>FINANCE</span></h1>
        <p>Colegio de Naujan</p>
    </div>

    <nav class="nav-links">
        <a href="dashboard.php">Dashboard</a>
        <a href="studentinfo.php">Student Information</a>
        <a href="studentfines.php">Student Fines</a>
        <a href="reports.php">Reports</a>
        <a href="aboutcsc.php">About CSC</a>
        <a href="logout.php" class="logout-btn">Logout</a>
    </nav>
</header>

<main class="main-content">

    <!-- HERO SECTION -->
    <section class="hero-section">
        <div class="hero-text">
            <h2>Welcome to CSC Finance Portal</h2>
            <p>Official Finance Management System of the Central Student Council</p>
        </div>
    </section>

    <!-- CENTER IMAGE SECTION -->
    <section class="center-image-section">
        <!-- Insert Colegio de Naujan image here later -->
        <img src="../Image/CDN PICTURE.jpg" alt="Colegio de Naujan">
    </section>

    <!-- DETAILS SECTION -->
    <section class="details-section">
        <h3> CSC Finance</h3>
        <p>
            The <strong>CSC: Finance System of Colegio de Naujan</strong> is an official
            web-based platform designed to efficiently manage student financial records,
            Fines, Transactions, Student Information and Reports under the Central Student Council.
        </p>

        <p>
            This system ensures transparency, accuracy, and accessibility of financial
            information for students and administrators. It allows authorized personnel
            to monitor transactions, generate reports, and maintain organized financial
            documentation in a secure digital environment.
        </p>

        <p>
            Through this platform, CSC aims to promote responsible financial management,
            accountability, and improved service for the Colegio de Naujan community.
        </p>
    </section>

</main>

<footer class="footer">
    <p>© <?php echo date('Y'); ?> CSC Finance | Colegio de Naujan</p>
</footer>

<!-- JS CONNECTOR -->
<script src="../Js/homepage.js"></script>
</body>
</html>

