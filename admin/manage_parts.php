<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit;
}

include '../db_config.php';

// Fetch parts
$sql = "SELECT * FROM parts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Part Name</th><th>Description</th><th>Price</th><th>Actions</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["part_name"]. "</td><td>" . $row["description"]. "</td><td>" . $row["price"]. "</td>";
        echo "<td><a href='edit_part.php?id=".$row["id"]."'>Edit</a> | <a href='delete_part.php?id=".$row["id"]."'>Delete</a></td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Add part
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $part_name = $_POST['part_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    
    $sql = "INSERT INTO parts (part_name, description, price) VALUES ('$part_name', '$description', '$price')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New part added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Parts</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/scripts.js"></script>
</head>
<body>
    <header>
        <h1>Manage Parts</h1>
    </header>
    <div class="container">
        <button onclick="toggleForm()">Add New Part</button>
        <div id="addPartForm" style="display:none;">
            <form method="post" action="">
                Part Name: <input type="text" name="part_name" required><br>
                Description: <textarea name="description" required></textarea><br>
                Price: <input type="text" name="price" required><br>
                <button type="submit">Add Part</button>
            </form>
        </div>
        <div>
            <?php if ($result->num_rows > 0) { ?>
                <!-- Display table of parts here -->
                <table>
                    <!-- Table headers -->
                    <tr>
                        <th>ID</th>
                        <th>Part Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                    <!-- Table data -->
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['part_name']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td>
                                <a href="edit_part.php?id=<?php echo $row['id']; ?>">Edit</a> |
                                <a href="delete_part.php?id=<?php echo $row['id']; ?>" class="delete-link">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            <?php } else { ?>
                <p>No parts available</p>
            <?php } ?>
        </div>
    </div>
</body>
</html>