<?php
include_once "connect.php";
/** @var mysqli $conn */

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$id = intval($_POST['id'] ?? 0);
if ($id <= 0) {
    echo "Please enter a valid student ID.";
    echo '<br><a href="index.php">Back</a>';
    exit;
}

$stmt = $conn->prepare("DELETE FROM students WHERE id = ?");
if (!$stmt) {
    die("Prepare failed: " . htmlspecialchars($conn->error, ENT_QUOTES, 'UTF-8'));
}

$stmt->bind_param('i', $id);
if ($stmt->execute()) {
    echo "Student has been deleted.<br><br>";
    echo '<a href="index.php">Back</a>';
} else {
    echo "Error deleting record: " . htmlspecialchars($stmt->error, ENT_QUOTES, 'UTF-8');
}

$stmt->close();
$conn->close();
?>
