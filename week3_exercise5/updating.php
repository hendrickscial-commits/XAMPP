<?php
include_once "connect.php";
/** @var mysqli $conn */

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$id = intval($_POST['id'] ?? 0);
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');

if ($id <= 0 || $name === '' || $email === '') {
    echo "Please provide a valid ID, name, and email.";
    echo '<br><a href="index.php">Back</a>';
    exit;
}

$stmt = $conn->prepare("UPDATE students SET name = ?, email = ? WHERE id = ?");
if (!$stmt) {
    die("Prepare failed: " . htmlspecialchars($conn->error, ENT_QUOTES, 'UTF-8'));
}

$stmt->bind_param('ssi', $name, $email, $id);
if ($stmt->execute()) {
    echo "Student information was updated.<br><br>";
    echo '<a href="index.php">Back</a>';
} else {
    echo "Error updating record: " . htmlspecialchars($stmt->error, ENT_QUOTES, 'UTF-8');
}

$stmt->close();
$conn->close();
?>
