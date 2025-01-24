<?php
session_start();
include '../db_config.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM parts WHERE id='$id'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Part deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
header("Location: manage_parts.php");
?>