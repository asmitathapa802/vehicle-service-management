<?php
session_start();
if (!isset($_SESSION['user_logged_in'])) {
    header('Location: ../auth/login.php');
    exit();
}

require_once __DIR__ . '/../../../db_config.php';

// Fetch service bookings for the logged-in user
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM service_bookings WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$bookings = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Service Bookings - Vehicle Service Management</title>
    <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>
    <header>
        <h1>Service Bookings</h1>
    </header>
    <nav>
        <a href="dashboard.php">Dashboard</a>
        <a href="service_bookings.php">Service Bookings</a>
        <a href="../auth/logout.php">Logout</a>
    </nav>
    <div class="container">
        <h2>Your Service Bookings</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Vehicle</th>
                    <th>Status</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bookings as $booking): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($booking['id']); ?></td>
                        <td><?php echo htmlspecialchars($booking['vehicle']); ?></td>
                        <td><?php echo htmlspecialchars($booking['status']); ?></td>
                        <td><?php echo htmlspecialchars($booking['created_at']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>