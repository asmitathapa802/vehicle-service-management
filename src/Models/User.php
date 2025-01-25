<?php
require_once __DIR__ . '/../../db_config.php';

class User {
    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function create($username, $password, $email) {
        $username = $this->sanitizeInput($username);
        $password = $this->sanitizeInput($password);
        $email = $this->sanitizeInput($email);

        $stmt = $this->conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
        if (!$stmt) {
            error_log("Prepare failed: (" . $this->conn->errno . ") " . $this->conn->error);
            return false;
        }

        $stmt->bind_param("sss", $username, $password, $email);
        $stmt->execute();
        $stmt->close();
        return true;
    }

    public function findByUsername($username) {
        $username = $this->sanitizeInput($username);

        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = ?");
        if (!$stmt) {
            error_log("Prepare failed: (" . $this->conn->errno . ") " . $this->conn->error);
            return false;
        }

        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();
        return $user;
    }

    private function sanitizeInput($input) {
        return htmlspecialchars(strip_tags(trim($input)));
    }
}
?>