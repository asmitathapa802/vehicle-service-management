<?php
// Include the database configuration file
include 'db_config.php';

// Function to register a new user
function registerUser($username, $password) {
    global $conn;
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash the password for security
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Function to authenticate a user
function authenticateUser($username, $password) {
    global $conn;
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);
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
    $sql = "INSERT INTO parts (part_name, description, price) VALUES ('$part_name', '$description', '$price')";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Function to delete a part
function deletePart($id) {
    global $conn;
    $sql = "DELETE FROM parts WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Function to update a part
function updatePart($id, $part_name, $description, $price) {
    global $conn;
    $sql = "UPDATE parts SET part_name='$part_name', description='$description', price='$price' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}
?>