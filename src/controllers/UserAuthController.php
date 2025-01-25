<?php
require_once __DIR__ . '/../../db_config.php';

class UserAuthController {
    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function register($username, $password, $email) {
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

    public function login($username, $password) {
        $username = $this->sanitizeInput($username);
        $password = $this->sanitizeInput($password);

        $stmt = $this->conn->prepare("SELECT id, password FROM users WHERE username = ?");
        if (!$stmt) {
            error_log("Prepare failed: (" . $this->conn->errno . ") " . $this->conn->error);
            return false;
        }

        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $stmt->bind_result($id, $stored_password);
            $stmt->fetch();

            if ($password === $stored_password) {
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['user_logged_in'] = true;
                $_SESSION['user_id'] = $id;
                $stmt->close();
                return true;
            } else {
                $stmt->close();
                return false;
            }
        } else {
            $stmt->close();
            return false;
        }
    }

    public function logout() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        session_unset();
        session_destroy();
    }

    private function sanitizeInput($input) {
        return htmlspecialchars(strip_tags(trim($input)));
    }
}

// Usage example for registration
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $authController = new UserAuthController();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    if ($authController->register($username, $password, $email)) {
        header("Location: login.php");
        exit;
    } else {
        echo "Registration failed. Please try again.";
    }
}

// Usage example for login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $authController = new UserAuthController();
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($authController->login($username, $password)) {
        header("Location: ../user/dashboard.php");
        exit;
    } else {
        echo "Login failed. Please try again.";
    }
}
?>