<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit;
}

include '../db_config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Vehicle Service Management</title>
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
            padding: 15px 0;
            text-align: center;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .card {
            display: inline-block;
            width: 30%;
            padding: 20px;
            margin: 1%;
            background-color: #f4f4f4;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
            transition: transform 0.2s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card h3 {
            margin-top: 0;
        }
        .card p {
            color: #555;
        }
        button {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        button:hover {
            background-color: #555;
        }
        nav {
            background-color: #333;
            overflow: hidden;
        }
        nav a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        nav a:hover {
            background-color: #ddd;
            color: black;
        }
        @media (max-width: 768px) {
            .card {
                width: 100%;
                margin-bottom: 20px;
            }
            nav a {
                float: none;
                width: 100%;
                text-align: left;
                padding-left: 20px;
            }
        }

        @media (max-width: 480px) {
            .card {
                padding: 10px;
                margin: 10px 0;
            }
            button {
                width: 100%;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
    </header>
    <nav>
        <a href="admin_dashboard.php">Dashboard</a>
        <a href="manage_parts.php">Manage Parts</a>
    </nav>
    <div class="container">
        <div class="card">
            <h3>Manage Parts</h3>
            <p>View, add, and update motorbike parts.</p>
            <button onclick="window.location.href='manage_parts.php'">Go to Manage Parts</button>
        </div>
        <div class="card">
            <h3>View Users</h3>
            <p>View and manage registered users.</p>
            <button onclick="window.location.href='view_users.php'">Go to Users</button>
        </div>
        <div class="card">
            <h3>Service Bookings</h3>
            <p>View and manage service bookings.</p>
            <button onclick="window.location.href='service_bookings.php'">Go to Bookings</button>
        </div>
        <!-- Add more cards as needed -->
    </div>
</body>
</html>
