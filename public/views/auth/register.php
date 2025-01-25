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
        </form>
    </div>
</body>
</html>