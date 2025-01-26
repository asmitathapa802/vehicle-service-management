<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php');
    exit();
}

require_once __DIR__ . '/../db_config.php';

if (isset($_GET['id'])) {
    $user_id = intval($_GET['id']);
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->close();
    }
}

header('Location: view_users.php');
exit();
?>