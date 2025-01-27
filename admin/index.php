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
    <link rel="stylesheet" href="../css/admin_styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
            flex-shrink: 0;
        }
        nav {
            background-color: #444;
            overflow: hidden;
            flex-shrink: 0;
        }
        nav a {
            float: left;
            display: block;
            color: #fff;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        nav a:hover {
            background-color: #ddd;
            color: black;
        }
        .container {
            padding: 20px;
            flex-grow:1;
            overflow-y: auto;
        }
        .card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin: 20px;
            padding: 20px;
            text-align: center;
            transition: transform 0.2s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card img {
            max-width: 100px;
            margin-bottom: 10px;
        }
        .card h3 {
            margin: 10px 0;
        }
        .card p {
            color: #666;
        }
        .card .btn {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
        .card .btn:hover {
            background-color: #555;
        }
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
            flex-shrink:0;
        }
    </style>
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
    </header>
    <nav>
        <a href="index.php">Dashboard</a>
        <a href="manage_parts.php">Manage Parts</a>
        <a href="view_users.php">View Users</a>
        <a href="manage_service_bookings.php">Service Bookings</a>
        <a href="logout.php">Logout</a>
    </nav>
    <div class="container">
        <h2>Welcome, Admin!</h2>
        <div class="dashboard-cards">
            <div class="card">
                <h3>Manage Parts</h3>
                <p>Add, edit, and delete vehicle parts.</p>
                <a href="manage_parts.php" class="btn">Go to Parts</a>
            </div>
            <div class="card">
                <h3>View Users</h3>
                <p>View and manage users.</p>
                <a href="view_users.php" class="btn">Go to Users</a>
            </div>
            <div class="card">
                <h3>Service Bookings</h3>
                <p>View and manage service bookings.</p>
                <a href="manage_service_bookings.php" class="btn">Go to Bookings</a>
            </div>
        </div>
    </div>
    <div>
        <h2>Contact Information</h2>
        <p>Email: asmitathapa@gmail.com</p>
        <p>Phone: +977 9876543210</p>
        <p>Address: Damak-8, Jhapa, Nepal</p>
    </div>
        <footer>
        <p>&copy; 2025 Vehicle Service Management. All rights reserved.</p>
    </footer>
</body>
</html>