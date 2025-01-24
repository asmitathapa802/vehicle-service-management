<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit;
}

include '../db_config.php';

// Add part
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'create') {
    $part_name = $_POST['part_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    
    $sql = "INSERT INTO parts (part_name, description, price) VALUES ('$part_name', '$description', '$price')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert success'>New part added successfully</div>";
    } else {
        echo "<div class='alert error'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}

// Fetch parts
$sql = "SELECT * FROM parts";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Parts - Vehicle Service Management</title>
    <link rel="stylesheet" href="css/styles.css">
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
        <button id="toggleButton" class="btn btn-primary">Add New Part</button>
        <div id="addPartForm" class="form-group">
            <form method="post" action="">
                <input type="hidden" name="action" value="create">
                <div class="form-group">
                    <label for="part_name">Part Name:</label>
                    <input type="text" id="part_name" name="part_name" required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="text" id="price" name="price" required>
                </div>
                <button type="submit" class="btn btn-success">Add Part</button>
            </form>
        </div>
        <div>
            <?php if ($result->num_rows > 0) { ?>
                <table class="table table-striped table-bordered mt-4">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Part Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td data-label="ID"><?php echo $row['id']; ?></td>
                                <td data-label="Part Name"><?php echo $row['part_name']; ?></td>
                                <td data-label="Description"><?php echo $row['description']; ?></td>
                                <td data-label="Price"><?php echo $row['price']; ?></td>
                                <td data-label="Actions">
                                    <a href="edit_part.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="delete_part.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm delete-link">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <p>No parts available</p>
            <?php } ?>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>

