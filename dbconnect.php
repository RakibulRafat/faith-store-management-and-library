<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_faithstore";

// Create Connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
     die(mysqli_error($conn));
  } 

?>