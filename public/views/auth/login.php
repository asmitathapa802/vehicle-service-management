<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Login - Vehicle Service Management</title>
    <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>
    <header>
        <h1>User Login</h1>
    </header>
    <div class="container">
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