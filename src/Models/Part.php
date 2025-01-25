<?php
require_once __DIR__ . '/../../db_config.php';

class Part {
    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function create($part_name, $description, $price) {
        $part_name = $this->sanitizeInput($part_name);
        $description = $this->sanitizeInput($description);
        $price = $this->sanitizeInput($price);

        $stmt = $this->conn->prepare("INSERT INTO parts (part_name, description, price) VALUES (?, ?, ?)");
        if (!$stmt) {
            error_log("Prepare failed: (" . $this->conn->errno . ") " . $this->conn->error);
            return false;
        }

        $stmt->bind_param("ssd", $part_name, $description, $price);
        $stmt->execute();
        $stmt->close();
        return true;
    }

    public function findAll() {
        $result = $this->conn->query("SELECT * FROM parts");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    private function sanitizeInput($input) {
        return htmlspecialchars(strip_tags(trim($input)));
    }
}
?>