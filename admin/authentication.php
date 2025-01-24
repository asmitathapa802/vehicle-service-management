<?php
session_start();
include '../db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admins WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: index.php");
    } else {
        $_SESSION['login_error'] = "Invalid login credentials";
        header("Location: admin_login.php");
    }
    exit();
}
?>
