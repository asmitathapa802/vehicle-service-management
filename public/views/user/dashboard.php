<?php
session_start();
if (!isset($_SESSION['user_logged_in'])) {
    header('Location: ../auth/login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard - Vehicle Service Management</title>
    <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>
    <header>
        <h1>User Dashboard</h1>
    </header>
    <nav>
        <a href="dashboard.php">Dashboard</a>
        <a href="service_bookings.php">Service Bookings</a>
        <a href="../auth/logout.php">Logout</a>
    </nav>
    <div class="container">
        <h2>Welcome, User!</h2>
        <p>Use the navigation links to manage your service bookings.</p>
    </div>
</body>
</html>