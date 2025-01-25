<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php');
    exit();
}

require_once __DIR__ . '/../db_config.php';

// Fetch all service bookings
$result = $conn->query("SELECT service_bookings.*, users.username FROM service_bookings JOIN users ON service_bookings.user_id = users.id");
$bookings = $result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Service Bookings - Vehicle Service Management</title>
    <link rel="stylesheet" href="css/admin_styles.css">
    <script src="js/admin_scripts.js" defer></script>
</head>
<body>
    <header>
        <h1>Service Bookings</h1>
    </header>
    <nav>
        <a href="index.php">Dashboard</a>
        <a href="manage_parts.php">Manage Parts</a>
        <a href="view_users.php">View Users</a>
        <a href="service_bookings.php">Service Bookings</a>
        <a href="logout.php">Logout</a>
    </nav>
    <div class="container">
        <h2>Existing Service Bookings</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Vehicle</th>
                    <th>Service Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bookings as $booking): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($booking['id']); ?></td>
                        <td><?php echo htmlspecialchars($booking['username']); ?></td>
                        <td><?php echo htmlspecialchars($booking['vehicle']); ?></td>
                        <td><?php echo htmlspecialchars($booking['service_date']); ?></td>
                        <td><?php echo htmlspecialchars($booking['status']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>