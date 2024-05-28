<?php
include('header.php');

if (isset($_POST['getSubmit'])) {
    $product = $_POST["pdropdown"];
    $user = $_POST["udropdown"];
    $assigndate = $_POST["AssignDate"];
    $returndate = $_POST["Returndate"];
    $Location = $_POST["loc"];
    $quantity = $_POST["quantity"];
    $comment = $_POST["com"];

    // Update product quantity in the products table
    $updateProductQuantity = "UPDATE product SET quantity = quantity - '$quantity' WHERE pid = '$product'";
    if (mysqli_query($conn, $updateProductQuantity)) {
        // Product quantity updated successfully, proceed with assigning
        $sql = "INSERT INTO assigned (pid, uid, start_date, end_date, location, quantity, comment)
                VALUES ('$product', '$user', '$assigndate', '$returndate', '$Location', '$quantity', '$comment')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Product Assigned Successfully');</script>";
        } else {
            echo "<script>alert('Database error: " . mysqli_error($conn) . "');</script>";
        }
    } else {
        echo "<script>alert('Error updating product quantity: " . mysqli_error($conn) . "');</script>";
    }
} else {
    echo "not working";
}

// Close the database connection
$conn->close();
?>
