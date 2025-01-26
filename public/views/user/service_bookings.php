<?php
session_start();
if (!isset($_SESSION['user_logged_in'])) {
    header('Location: ../auth/login.php');
    exit();
}

require_once __DIR__ . '/../../../db_config.php';

// Fetch user-specific service bookings
$user_id = $_SESSION['user_id'];
$bookings = [];
$stmt = $conn->prepare("SELECT id, vehicle, status, created_at FROM service_bookings WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $bookings[] = $row;
}
$stmt->close();

// Handle service booking form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['book_service'])) {
    $vehicle = htmlspecialchars(strip_tags(trim($_POST['vehicle'])));
    $status = 'Pending';

    $stmt = $conn->prepare("INSERT INTO service_bookings (user_id, vehicle, status) VALUES (?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param("iss", $user_id, $vehicle, $status);
        $stmt->execute();
        $stmt->close();
        header('Location: service_bookings.php');
        exit();
    } else {
        $error = "Failed to book service. Please try again.";
    }
}
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
        <h2>Book a New Service</h2>
        <form method="POST" action="service_bookings.php">
            <label for="vehicle">Vehicle:</label>
            <input type="text" id="vehicle" name="vehicle" required>
            <button type="submit" name="book_service">Book Service</button>
            <?php if (isset($error)): ?>
                <p class="error"><?php echo htmlspecialchars($error); ?></p>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>