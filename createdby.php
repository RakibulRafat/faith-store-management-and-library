<?php
session_start(); // Start the session (if not started already)

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page or handle the situation as needed
    header("Location: login.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_faithstore";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Handle form submission to insert a new record
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $createdBy = $_POST['record_data'];

    // Get the user ID from the session
    $createdBy = $_SESSION['uid'];

    // Insert the record into the database
    $sql = "INSERT INTO product (created_by) VALUES ('$createdBy')";

    if ($conn->query($sql) === TRUE) {
        echo "Record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>