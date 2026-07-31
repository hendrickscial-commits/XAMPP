<?php
include 'connect.php';

$message = '';
$editId = 0;
$editData = [
  'name' => '',
  'email' => '',
  'message' => ''
];

if ($conn instanceof mysqli) {
  $conn->query("CREATE TABLE IF NOT EXISTS contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    message TEXT NOT NULL
  )");

  if (isset($_GET['delete_id'])) {
    $deleteId = intval($_GET['delete_id']);

    if ($deleteId > 0) {
      $stmt = $conn->prepare("DELETE FROM contacts WHERE id = ?");
      $stmt->bind_param("i", $deleteId);
      $stmt->execute();
      $stmt->close();
      $message = "Record deleted successfully.";
    }
  }

  if (isset($_GET['edit_id'])) {
    $editId = intval($_GET['edit_id']);

    if ($editId > 0) {
      $stmt = $conn->prepare("SELECT id, name, email, message FROM contacts WHERE id = ?");
      $stmt->bind_param("i", $editId);
      $stmt->execute();
      $result = $stmt->get_result();

      if ($row = $result->fetch_assoc()) {
        $editData = $row;
      }

      $stmt->close();
    }
  }

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $messageText = trim($_POST['message'] ?? '');
    $submittedId = intval($_POST['id'] ?? 0);

    if ($name === '' || $email === '' || $messageText === '') {
      $message = "Please fill in all fields.";
    } else {
      if ($submittedId > 0) {
        $stmt = $conn->prepare("UPDATE contacts SET name = ?, email = ?, message = ? WHERE id = ?");
        $stmt->bind_param("sssi", $name, $email, $messageText, $submittedId);
        $stmt->execute();
        $stmt->close();
        $message = "Record updated successfully.";
      } else {
        $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $messageText);
        $stmt->execute();
        $stmt->close();
        $message = "Record saved successfully.";
      }
    }
  }

  $result = $conn->query("SELECT id, name, email, message FROM contacts ORDER BY id DESC");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Task 5</title>
</head>
<body>
  <h2>Task 5</h2>

  <?php if ($message !== ''): ?>
    <p><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></p>
  <?php endif; ?>

  <form action="task_5.php" method="post">
    <input type="hidden" name="id" value="<?php echo $editId; ?>">

    <label>Name</label><br>
    <input type="text" name="name" value="<?php echo htmlspecialchars($editData['name'], ENT_QUOTES, 'UTF-8'); ?>" required><br><br>

    <label>Email</label><br>
    <input type="email" name="email" value="<?php echo htmlspecialchars($editData['email'], ENT_QUOTES, 'UTF-8'); ?>" required><br><br>

    <label>Message</label><br>
    <textarea name="message" rows="4" cols="30" required><?php echo htmlspecialchars($editData['message'], ENT_QUOTES, 'UTF-8'); ?></textarea><br><br>

    <button type="submit">Save Record</button>
  </form>

  <hr>

  <h3>All Records</h3>
  <?php if ($result && $result->num_rows > 0): ?>
    <table border="1" cellpadding="8" cellspacing="0">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Message</th>
        <th>Actions</th>
      </tr>
      <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8'); ?></td>
          <td><?php echo htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8'); ?></td>
          <td><?php echo htmlspecialchars($row['message'], ENT_QUOTES, 'UTF-8'); ?></td>
          <td>
            <a href="task_5.php?edit_id=<?php echo $row['id']; ?>">Edit</a>
            |
            <a href="task_5.php?delete_id=<?php echo $row['id']; ?>" onclick="return confirm('Delete this record?');">Delete</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </table>
  <?php else: ?>
    <p>No records found.</p>
  <?php endif; ?>

  <p><a href="index.php">Back to other Exercise 5 tasks</a></p>
</body>
</html>