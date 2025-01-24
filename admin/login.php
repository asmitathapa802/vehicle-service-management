<?php
session_start();
if (isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login - Vehicle Service Management</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="login-container">
        <h1>Admin Login</h1>
        <form method="post" action="authentication.php">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="login-btn">Login</button>
        </form>
        <?php
        if (isset($_SESSION['login_error'])) {
            echo "<div class='alert error'>" . $_SESSION['login_error'] . "</div>";
            unset($_SESSION['login_error']);
        }
        ?>
    </div>
</body>
</html>

