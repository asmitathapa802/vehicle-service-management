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
        echo "New part added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
    <script>
    function toggleForm() {
        var form = document.getElementById('addPartForm');
        if (form.style.display === 'none' || form.style.display === '') {
            form.style.display = 'block';
        } else {
            form.style.display = 'none';
        }
    }

    function confirmDelete() {
        return confirm('Are you sure you want to delete this part?');
    }

    document.addEventListener('DOMContentLoaded', function() {
        var deleteLinks = document.querySelectorAll('.delete-link');
        deleteLinks.forEach(function(link) {
            link.addEventListener('click', function(event) {
                if (!confirmDelete()) {
                    event.preventDefault();
                }
            });
        });
    });
    </script>
</head>
<body>
    <header>
        <h1>Manage Parts</h1>
    </header>
    <div class="container">
        <button onclick="toggleForm()">Add New Part</button>
        <div id="addPartForm" style="display:none;">
            <form method="post" action="">
                <input type="hidden" name="action" value="create">
                Part Name: <input type="text" name="part_name" required><br>
                Description: <textarea name="description" required></textarea><br>
                Price: <input type="text" name="price" required><br>
                <button type="submit">Add Part</button>
            </form>
        </div>
        <div>
            <?php if ($result->num_rows > 0) { ?>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Part Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
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