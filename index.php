
<!-- index.php -->
<?php
include 'db.php'; //the database file
$result = $conn->query("SELECT * FROM tasks");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">   
    <title>To-Do List</title>
</head>
<body>
    <h1>My To-Do List</h1>
    <!-- for adding new task -->
    <form action="add_task.php" method="POST">
        <input type="text" name="task" placeholder="New task" required>
        <input type="submit" value="Add task">
    </form>

    <h2>Task:</h2>
    <ul>
        <?php while($row = $result->fetch_assoc()): ?>
            <li>
                <!-- Display task description and status -->
                <!--<?php echo htmlspecialchars($row['task']); ?> - <?php echo $row['STATUS']; ?> -->
                Task: <?php echo htmlspecialchars($row['task']); ?> <br>
                Status: <?php echo htmlspecialchars($row['STATUS']); ?>
            </li>
        <?php endwhile; ?>
    </ul>
</body>
</html>