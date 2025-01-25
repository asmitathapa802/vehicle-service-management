<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Load environment variables from a configuration file
$config = parse_ini_file(__DIR__ . '/.env');

// Check for required environment variables
$required_env_vars = ['DB_SERVER', 'DB_USERNAME', 'DB_PASSWORD', 'DB_NAME'];
foreach ($required_env_vars as $var) {
    if (!isset($config[$var])) {
        error_log("Environment variable $var is not set.");
        echo "Sorry, there was a problem with the server configuration. Please try again later.";
        exit;
    }
}

$servername = $config['DB_SERVER'];
$username = $config['DB_USERNAME'];
$password = $config['DB_PASSWORD'];
$dbname = $config['DB_NAME'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
