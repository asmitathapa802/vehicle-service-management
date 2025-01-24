<?php
session_start();
include '../db_config.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM parts WHERE id='$id'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Part not found";
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'update') {
    $part_name = $_POST['part_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    
    $sql = "UPDATE parts SET part_name='$part_name', description='$description', price='$price' WHERE id='$id'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Part updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Part - Vehicle Service Management</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Edit Part</h1>
    </header>
    <div class="container">
        <form method="post" action="">
            <input type="hidden" name="action" value="update">
            Part Name: <input type="text" name="part_name" value="<?php echo $row['part_name']; ?>" required><br>
            Description: <textarea name="description" required><?php echo $row['description']; ?></textarea><br>
            Price: <input type="text" name="price" value="<?php echo $row['price']; ?>" required><br>
            <button type="submit">Update Part</button>
        </form>
    </div>
</body>
</html>