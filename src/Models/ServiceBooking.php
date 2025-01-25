<?php
require_once __DIR__ . '/../../db_config.php';

class ServiceBooking {
    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function create($user_id, $vehicle, $status = 'Pending') {
        $user_id = $this->sanitizeInput($user_id);
        $vehicle = $this->sanitizeInput($vehicle);
        $status = $this->sanitizeInput($status);

        $stmt = $this->conn->prepare("INSERT INTO service_bookings (user_id, vehicle, status) VALUES (?, ?, ?)");
        if (!$stmt) {
            error_log("Prepare failed: (" . $this->conn->errno . ") " . $this->conn->error);
            return false;
        }

        $stmt->bind_param("iss", $user_id, $vehicle, $status);
        $stmt->execute();
        $stmt->close();
        return true;
    }

    public function findByUserId($user_id) {
        $user_id = $this->sanitizeInput($user_id);

        $stmt = $this->conn->prepare("SELECT * FROM service_bookings WHERE user_id = ?");
        if (!$stmt) {
            error_log("Prepare failed: (" . $this->conn->errno . ") " . $this->conn->error);
            return false;
        }

        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $bookings = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $bookings;
    }

    private function sanitizeInput($input) {
        return htmlspecialchars(strip_tags(trim($input)));
    }
}
?>