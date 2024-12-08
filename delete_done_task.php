<?php
include 'db.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the task ID from the form
    $task_id = $_POST['task_id'];

    // Prepare and execute the SQL query to delete the 'Done' task
    $stmt = $conn->prepare("DELETE FROM task WHERE id = ? AND status = 'Done'");
    $stmt->bind_param("i", $task_id); // Bind the task_id to the SQL statement

    if ($stmt->execute()) {
        // Redirect back to the main page after successful deletion
        header("Location: index.php");
        exit();
    } else {
        // Handle query errors
        echo "Error: " . $conn->error;
    }

    $stmt->close();
}
?>