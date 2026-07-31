<?php
include_once "connect.php";
/** @var mysqli $conn */

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');

if ($name === '' || $email === '' || $message === '') {
    echo "All fields are required.";
    echo '<br><a href="index.php">Back</a>';
    exit;
}

$stmt = $conn->prepare("INSERT INTO students (name, email, message) VALUES (?, ?, ?)");
if (!$stmt) {
    die("Prepare failed: " . htmlspecialchars($conn->error, ENT_QUOTES, 'UTF-8'));
}

$stmt->bind_param('sss', $name, $email, $message);
if ($stmt->execute()) {
    echo "Record saved successfully.<br><br>";
    echo '<a href="index.php">Back</a>';
} else {
    echo "Error: " . htmlspecialchars($stmt->error, ENT_QUOTES, 'UTF-8');
}

$stmt->close();
$conn->close();
?>
