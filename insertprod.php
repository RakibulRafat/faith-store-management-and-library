<?php
include('header.php');

// Check if the user is logged in
if (!isset($_SESSION['uid'])) {
    // Redirect to the login page or handle the situation as needed
    header("Location: login.php");
    exit();
}

if (isset($_POST['submit'])) {
    $pname = $_POST["title"];
    $catagory = $_POST["Item"];
    $description = $_POST["Description"];
    $Color = $_POST["Color"];
    $type = $_POST["Type"];
    $Source = $_POST["ItemSource"];
    $Status = $_POST["ActiveStatus"];
    $price = $_POST["price"];
    $Quantity = $_POST["Quantity"];
    $purchase_date = $_POST["EntryDate"];
    $purchase_person = $_POST["person"];
    $expired_date = $_POST["ExpDate"];
    $createdBy = $_SESSION['uid'];

    // Handle file upload
    $image = $_FILES["image"];
    $targetDir = "img/";
    $targetFile = $targetDir . basename($image["name"]);
    $uploadOk = 1;

    // Check if file is a valid image
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "<script>alert('Invalid file format. Only JPG, JPEG, and PNG files are allowed.');</script>";
        $uploadOk = 0;
    }

    // Check for file upload errors
    if ($uploadOk == 1) {
        if (move_uploaded_file($image["tmp_name"], $targetFile)) {
            // File uploaded successfully, continue with the database insert
            $sql = "INSERT INTO Product (pname, catid, pdescription, color, ptype, item_source, active_status, price, quantity, purchase_date, expired_date, purchase_person, pimage, created_by)
            VALUES ('$pname', '$catagory', '$description', '$Color', '$type', '$Source', '$Status', '$price', '$Quantity', '$purchase_date', '$expired_date', '$purchase_person', '$targetFile', '$createdBy')";

            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Product Upload Successful');</script>";
            } else {
                echo "<script>alert('Database error: " . mysqli_error($conn) . "');</script>";
            }
        } else {
            echo "<script>alert('File upload failed.');</script>";
        }
    }
}

$conn->close();

include('footer.php');
?>
