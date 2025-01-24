<?php
session_start();
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['user_logged_in'] = true;
        header("Location: user_dashboard.php");
    } else {
        $_SESSION['login_error'] = "Invalid login credentials";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Login - Vehicle Service Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 8px;
            text-align: center;
        }
        .login-container h1 {
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .login-btn {
            width: 100%;
            padding: 10px 15px;
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.2s;
        }
        .login-btn:hover {
            background-color: #555;
        }
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .alert.error {
            background-color: #f44336;
            color: white;
        }
        /* Responsive design */
        @media (max-width: 600px) {
            .login-container {
                padding: 10px;
            }
            .form-group input {
                padding: 8px;
            }
            .login-btn {
                padding: 8px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>User Login</h1>
        <form method="post" action="">
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
