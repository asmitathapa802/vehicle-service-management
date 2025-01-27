<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php');
    exit();
}

require_once __DIR__ . '/../db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_status'])) {
    $booking_id = intval($_POST['booking_id']);
    $status = htmlspecialchars(strip_tags(trim($_POST['status'])));

    $stmt = $conn->prepare("UPDATE service_bookings SET status = ? WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("si", $status, $booking_id);
        $stmt->execute();
        $stmt->close();
    }
}

header('Location: manage_service_bookings.php');
exit();
?>