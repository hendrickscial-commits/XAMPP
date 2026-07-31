<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week 3 Exercise 5</title>
</head>
<body>
    <h1>Add Student</h1>
    <form action="create.php" method="post">
        <label for="name">Name</label><br>
        <input id="name" type="text" name="name" required><br><br>

        <label for="email">Email</label><br>
        <input id="email" type="email" name="email" required><br><br>

        <label for="message">Message</label><br>
        <textarea id="message" name="message" rows="5" cols="30" required></textarea><br><br>

        <button type="submit">Save</button>
    </form>

    <hr>
    <h1>All Students</h1>
    <?php
    include_once "connect.php";
    /** @var mysqli $conn */
    $sql = "SELECT * FROM students ORDER BY id DESC";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        echo '<table border="1" cellpadding="8" cellspacing="0">';
        echo '<tr><th>ID</th><th>Name</th><th>Email</th><th>Message</th></tr>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . '</td>';
            echo '<td>' . htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') . '</td>';
            echo '<td>' . htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') . '</td>';
            echo '<td>' . nl2br(htmlspecialchars($row['message'], ENT_QUOTES, 'UTF-8')) . '</td>';
            echo '</tr>';
        }
        echo '</table>';
        $result->free();
    } else {
        echo '<p>No students found.</p>';
    }
    $conn->close();
    ?>

    <hr>
    <h1>Update Student</h1>
    <form action="updating.php" method="post">
        <label for="update-id">Student ID</label><br>
        <input id="update-id" type="number" name="id" required><br><br>

        <label for="update-name">Name</label><br>
        <input id="update-name" type="text" name="name" required><br><br>

        <label for="update-email">Email</label><br>
        <input id="update-email" type="email" name="email" required><br><br>

        <button type="submit">Update</button>
    </form>

    <hr>
    <h1>Delete Student</h1>
    <form action="delete.php" method="post">
        <label for="delete-id">Student ID</label><br>
        <input id="delete-id" type="number" name="id" required><br><br>
        <button type="submit">Delete</button>
    </form>
</body>
</html>
