<?php 
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the task input from the form
    $task = $_POST['task'];

    // Make sure the task is not empty before inserting
    if (!empty($task)) {
        // Prepare the SQL statement to insert the task into the database
        $stmt = $conn->prepare("INSERT INTO task (task) VALUES (?)");
        $stmt->bind_param("s", $task); // Bind the task input to the SQL statement

        // Execute the query and check if it was successful
        if ($stmt->execute()) {
            // Redirect to the index page after successful insertion
            header("Location: index.php");
            exit();
        } else {
            // Display an error if the query failed
            echo "Error: " . $conn->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        // Handle case where the task input is empty
        echo "Please enter a task.";
    }
}
?>
