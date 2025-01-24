<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/scripts.js"></script>
</head>
<body>
    <header>
        <img src="images/logo.png" alt="Logo" style="width: 100px; height: auto;">
        <h1>Admin Dashboard</h1>
    </header>
    <div class="container">
        <p>Welcome, Admin!</p>
        <button onclick="window.location.href='manage_parts.php'">Manage Parts</button>
    </div>
</body>
</html>