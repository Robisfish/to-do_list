<?php
// Database connection details
$servername = "db_host";
$username = "db_username";
$password = ""; // Default password for XAMPP is empty
$dbname = "todo_list"; // Make sure this matches the database name in phpMyAdmin

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>