<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the task ID from the form
    $task_id = $_POST['task_id'];

    // Update the task's STATUS to 'Done'
    $stmt = $conn->prepare("UPDATE task SET status = 'Done' WHERE id = ?");
    $stmt->bind_param("i", $task_id);

    if ($stmt->execute()) {
        // Redirect back to the index page
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
}
?>
