<?php
include('header.php');

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

if (isset($_POST['delete'])) {
    $pid = $_POST['pid'];
    echo '<script type="text/javascript">
        var confirmDelete = confirm("Are you sure you want to delete?");
        if (confirmDelete) {
            window.location = "delete.php?pid=' . $pid . '";
        }
    </script>';
}

// Rest of your PHP code

include('footer.php');
?>