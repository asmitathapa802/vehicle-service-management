<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Vehicle Service Management</title>
    <link rel="stylesheet" href="css/admin_styles.css">
    <script src="js/admin_scripts.js" defer></script>
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
    </header>
    <nav>
        <a href="index.php">Dashboard</a>
        <a href="manage_parts.php">Manage Parts</a>
        <a href="view_users.php">View Users</a>
        <a href="service_bookings.php">Service Bookings</a>
        <a href="logout.php">Logout</a>
    </nav>
    <div class="container">
        <h2>Welcome, Admin!</h2>
        <p>Use the navigation links to manage the system.</p>
        <div class="dashboard-cards">
            <div class="card">
                <img src="images/manage_parts.png" alt="Manage Parts" class="card-img">
                <h3>Manage Parts</h3>
                <p>View and manage vehicle parts.</p>
                <a href="manage_parts.php" class="btn">Go to Parts</a>
            </div>
            <div class="card">
                <img src="images/manage_parts.png" alt="View Users" class="card-img">
                <h3>View Users</h3>
                <p>View and manage users.</p>
                <a href="view_users.php" class="btn">Go to Users</a>
            </div>
            <div class="card">
                <img src="images/manage_parts.png" alt="Service Bookings" class="card-img">
                <h3>Service Bookings</h3>
                <p>View and manage service bookings.</p>
                <a href="service_bookings.php" class="btn">Go to Bookings</a>
            </div>
        </div>
    </div>
</body>
</html>