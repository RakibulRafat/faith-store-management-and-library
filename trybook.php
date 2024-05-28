<?php
include('header.php');

// Check if the user is logged in
if (!isset($_SESSION['uid'])) {
    // Redirect to the login page or handle the situation as needed
    header("Location: login.php");
    exit();
}
if (isset($_POST['submit'])) {
    $request = $_POST["ReqDate"];
    $quantity = $_POST["total"];
    $prdid = $_POST["pid"];
    $usid = $_SESSION['uid'];

    // Correcting the SQL query
    $sql = "INSERT INTO requests (req_date, uid, pid, quantity)
            VALUES ('$request', '$usid', '$prdid', '$quantity')";
            
    // Check if the connection exists
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Request Successful');</script>";
    } else {
        echo "<script>alert('Database error: " . mysqli_error($conn) . "');</script>";
    }
}

$conn->close();

include('footer.php');
?>

