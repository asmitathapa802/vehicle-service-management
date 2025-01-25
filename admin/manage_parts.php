<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php');
    exit();
}

require_once __DIR__ . '/../db_config.php';

// Handle form submission for adding a new part
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_part'])) {
    $part_name = htmlspecialchars(strip_tags(trim($_POST['part_name'])));
    $description = htmlspecialchars(strip_tags(trim($_POST['description'])));
    $price = htmlspecialchars(strip_tags(trim($_POST['price'])));

    $stmt = $conn->prepare("INSERT INTO parts (part_name, description, price) VALUES (?, ?, ?)");
    $stmt->bind_param("ssd", $part_name, $description, $price);
    $stmt->execute();
    $stmt->close();
}

// Fetch all parts
$result = $conn->query("SELECT * FROM parts");
$parts = $result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Parts - Vehicle Service Management</title>
    <link rel="stylesheet" href="css/admin_styles.css">
    <script src="js/admin_scripts.js" defer></script>
</head>
<body>
    <header>
        <h1>Manage Parts</h1>
    </header>
    <nav>
        <a href="index.php">Dashboard</a>
        <a href="manage_parts.php">Manage Parts</a>
        <a href="view_users.php">View Users</a>
        <a href="service_bookings.php">Service Bookings</a>
        <a href="logout.php">Logout</a>
    </nav>
    <div class="container">
        <h2>Add New Part</h2>
        <form method="POST" action="manage_parts.php">
            <label for="part_name">Part Name:</label>
            <input type="text" id="part_name" name="part_name" required>
            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>
            <label for="price">Price:</label>
            <input type="number" step="0.01" id="price" name="price" required>
            <button type="submit" name="add_part">Add Part</button>
        </form>
        <h2>Existing Parts</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Part Name</th>
                    <th>Description</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($parts as $part): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($part['id']); ?></td>
                        <td><?php echo htmlspecialchars($part['part_name']); ?></td>
                        <td><?php echo htmlspecialchars($part['description']); ?></td>
                        <td><?php echo htmlspecialchars($part['price']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>