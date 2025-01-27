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
        echo "<script>alert('User already registered. Redirecting to login page.'); window.location.href = 'login.php';</script>";
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - Vehicle Service Management</title>
    <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>
    <header>
        <h1>Register</h1>
    </header>
    <nav>
        <a href="../../index.php">Home</a>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    </nav>
    <div class="container">
        <h2>Create an Account</h2>
        <?php if ($error): ?>
            <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <?php if ($success): ?>
            <p class="success"><?php echo $success; ?></p>
        <?php endif; ?>
        <form method="POST" action="register.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <button type="submit" name="register">Register</button>
        </form>
    </div>
</body>
</html>