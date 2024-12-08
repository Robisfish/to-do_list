<?php
include 'db.php'; // Database connection

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check for connection error
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted with POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Query to delete tasks where status is 'Done and Pending'
    $sql = "DELETE FROM task WHERE status IN ('Done', 'pending')";


    // Execute the query and check for success
    if ($conn->query($sql) === TRUE) {
        // Redirect back to index page after successful task removal
        header("Location: index.php");
        exit(); // Ensure no further script execution after redirect
    } else {
        // Output error if query fails
        echo "Error: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
