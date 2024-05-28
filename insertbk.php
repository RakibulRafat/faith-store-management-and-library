<?php 
include('header.php');

if(isset($_POST['submit'])) {
    $book = $_POST["bkname"];
    $author = $_POST["authore"];
    $publisher = $_POST["publisher"];
    $publishdate = $_POST["pubdate"];
    $format = $_POST["format"];   
    $totalCopy = $_POST["copies"];
    $booksource = $_POST["source"];
    $bookentry = $_POST["entrydate"];
    $description = $_POST["description"];

    // Handle file uploads
    $cover = $_FILES["image"];
    $pdf = $_FILES["pdf"]; // New PDF file upload field
    $targetDir = "img/";
    $coverTargetFile = $targetDir . basename($cover["name"]);
    $pdfTargetFile = $targetDir . basename($pdf["name"]); // New target file for PDF
    $uploadOk = 1;

    // Check if file is a valid image (for cover)
    $coverFileType = strtolower(pathinfo($coverTargetFile, PATHINFO_EXTENSION));
    if ($coverFileType != "jpg" && $coverFileType != "png" && $coverFileType != "jpeg") {
        echo "<script>alert('Invalid cover file format. Only JPG, JPEG, and PNG files are allowed.');</script>";
        $uploadOk = 0;
    }

    // Check if file is a PDF
    $pdfFileType = strtolower(pathinfo($pdfTargetFile, PATHINFO_EXTENSION));
    if ($pdfFileType != "pdf") {
        echo "<script>alert('Invalid PDF file format. Only PDF files are allowed.');</script>";
        $uploadOk = 0;
    }

    // Check for file upload errors (for cover)
    if ($uploadOk == 1) {
        if (move_uploaded_file($cover["tmp_name"], $coverTargetFile)) {
            // Cover file uploaded successfully, continue with the PDF file upload
            if (move_uploaded_file($pdf["tmp_name"], $pdfTargetFile)) {
                // PDF file uploaded successfully
                // Now you can include this file path in your database insertion query
            } else {
                echo "<script>alert('PDF file upload failed.');</script>";
                // You might want to handle this failure appropriately
            }

            // Proceed with database insertion
            $sql = "INSERT INTO books (book_tittle, author , publisher , publish_date, format, total_copies, cover, pdf, source, book_entry_date, Description)
            VALUES ('$book', '$author', '$publisher', '$publishdate', '$format', '$totalCopy', '$coverTargetFile', '$pdfTargetFile', '$booksource', '$bookentry', '$description')";

            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Book Upload Successful');</script>";
            } else {
                echo "<script>alert('Database error: " . mysqli_error($conn) . "');</script>";
            }
        } else {
            echo "<script>alert('Cover file upload failed.');</script>";
        }
    }
}
?>
