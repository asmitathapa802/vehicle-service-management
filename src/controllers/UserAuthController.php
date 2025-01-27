<?php
require_once __DIR__ . '/../../db_config.php';

class UserAuthController {
    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function isUserRegistered($username) {
        $stmt = $this->conn->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        $isRegistered = $stmt->num_rows > 0;
        $stmt->close();
        return $isRegistered;
    }

    public function login($username, $password) {
        $stmt = $this->conn->prepare("SELECT id, password FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($user_id, $stored_password);
        if ($stmt->fetch() && $password === $stored_password) {
            $_SESSION['user_logged_in'] = true;
            $_SESSION['user_id'] = $user_id;
            $stmt->close();
            return true;
        }
        $stmt->close();
        return false;
    }

    public function register($username, $password, $email) {
        if ($this->isUserRegistered($username)) {
            return false; // User already registered
        }
        $stmt = $this->conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $password, $email);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
}
?>