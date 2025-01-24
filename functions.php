<?php
// Include the database configuration file
include 'db_config.php';

// Sanitize input to prevent SQL injection
function sanitizeInput($data) {
    global $conn;
    return mysqli_real_escape_string($conn, htmlspecialchars(stripslashes(trim($data))));
}

// Function to register a new user
function registerUser($username, $password) {
    global $conn;
    $username = sanitizeInput($username);
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash the password for security

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashedPassword);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }

    $stmt->close();
}

// Function to authenticate a user
function authenticateUser($username, $password) {
    global $conn;
    $username = sanitizeInput($username);

    $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }

    $stmt->close();
}

// Function to get all motorbike parts
function getAllParts() {
    global $conn;
    $sql = "SELECT * FROM parts";
    $result = $conn->query($sql);
    $parts = [];

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $parts[] = $row;
        }
    }
    return $parts;
}

// Function to add a new part
function addPart($part_name, $description, $price) {
    global $conn;
    $part_name = sanitizeInput($part_name);
    $description = sanitizeInput($description);
    $price = sanitizeInput($price);

    $stmt = $conn->prepare("INSERT INTO parts (part_name, description, price) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $part_name, $description, $price);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }

    $stmt->close();
}

// Function to delete a part
function deletePart($id) {
    global $conn;
    $id = sanitizeInput($id);

    $stmt = $conn->prepare("DELETE FROM parts WHERE id=?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }

    $stmt->close();
}

// Function to update a part
function updatePart($id, $part_name, $description, $price) {
    global $conn;
    $id = sanitizeInput($id);
    $part_name = sanitizeInput($part_name);
    $description = sanitizeInput($description);
    $price = sanitizeInput($price);

    $stmt = $conn->prepare("UPDATE parts SET part_name=?, description=?, price=? WHERE id=?");
    $stmt->bind_param("sssi", $part_name, $description, $price, $id);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }

    $stmt->close();
}
?>
