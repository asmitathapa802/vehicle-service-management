<?php
session_start();
require_once __DIR__ . '/../../../src/Controllers/UserAuthController.php';

if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) {
    header('Location: ../user/dashboard.php');
    exit();
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $authController = new UserAuthController();
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the user is registered
    if (!$authController->isUserRegistered($username)) {
        echo "<script>alert('Sorry, the user is not registered.'); window.location.href = 'register.php';</script>";
        exit();
    }

    // Proceed with login if the user is registered
    if ($authController->login($username, $password)) {
        $_SESSION['user_logged_in'] = true;
        $_SESSION['username'] = $username;
        header('Location: ../user/dashboard.php');
        exit();
    } else {
        $error = 'Invalid username or password. Please try again.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Vehicle Service Management</title>
    <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>
    <header>
        <h1>Login</h1>
    </header>
    <nav>
        <a href="../../index.php">Home</a>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    </nav>
    <div class="container">
        <h2>Login to Your Account</h2>
        <?php if ($error): ?>
            <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form method="POST" action="login.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
    
</body>
</html>