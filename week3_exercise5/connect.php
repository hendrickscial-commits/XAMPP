<?php
$host = "localhost";
$user = "root";
$password = "";
$dbName = "php_project";

$conn = new mysqli($host, $user, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!$conn->select_db($dbName)) {
    if (!$conn->query("CREATE DATABASE IF NOT EXISTS `$dbName` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci")) {
        die("Database creation failed: " . $conn->error);
    }
    if (!$conn->select_db($dbName)) {
        die("Failed to select database: " . $conn->error);
    }
}

$tableSql = "CREATE TABLE IF NOT EXISTS students (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

if (!$conn->query($tableSql)) {
    die("Table creation failed: " . $conn->error);
}
?>
