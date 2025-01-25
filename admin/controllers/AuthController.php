<?php
require_once __DIR__ . '/../../db_config.php';

class AuthController {
    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function login($username, $password) {
        $username = $this->sanitizeInput($username);
        $password = $this->sanitizeInput($password);

        $stmt = $this->conn->prepare("SELECT id, password FROM admins WHERE username = ?");
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

            if ($password === $stored_password) { // Plain text password comparison
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_id'] = $id;
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
        session_start();
        session_unset();
        session_destroy();
        header('Location: ../auth/admin_login.php');
        exit();
    }

    private function sanitizeInput($input) {
        return htmlspecialchars(strip_tags(trim($input)));
    }
}

// Usage example
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $authController = new AuthController();

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($authController->login($username, $password)) {
            header("Location: ../index.php");
            exit;
        } else {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['login_error'] = "Invalid username or password.";
            header("Location: ../admin_login.php");
            exit;
        }
    }

    if (isset($_POST['logout'])) {
        $authController->logout();
        header("Location: ../admin_login.php");
        exit;
    }
}
?>