<?php
session_start();
require_once __DIR__ . '/../../../src/Controllers/UserAuthController.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $authController = new UserAuthController();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    if ($authController->register($username, $password, $email)) {
        $success = 'Registration successful. You can now <a href="login.php">login</a>.';
    } else {
        $error = 'Registration failed. Please try again.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Registration - Vehicle Service Management</title>
    <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>
    <header>
        <h1>User Registration</h1>
    </header>
    <div class="container">
        <form method="POST" action="register.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <button type="submit" name="register">Register</button>
            <?php if ($error): ?>
                <p class="error"><?php echo htmlspecialchars($error); ?></p>
            <?php endif; ?>
            <?php if ($success): ?>
                <p class="success"><?php echo htmlspecialchars($success); ?></p>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>