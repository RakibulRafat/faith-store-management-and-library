<?php 
// Include database connection and header file
include('header.php');

// Get book ID from the URL parameter
// if(isset($_GET['book_id'])) {
//     $book_id = $_GET['book_id'];

    // Fetch book data from the database
    // $sql = "SELECT cover, book_tittle, pdf  FROM books WHERE book_id = $book_id";
    //$result = mysqli_query($conn, $sql);

    // Query to select PDF data from your database
$sql = "SELECT file FROM books WHERE book_id = ?";  // Adjust your_table and id column name accordingly
$stmt = $conn->prepare($sql);
$id = 9; // Example: you may need to replace '1' with the actual ID of the PDF you want to retrieve
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($pdf_data);
$stmt->fetch();

// Set appropriate headers for PDF
header("Content-type: application/pdf");
// Output the PDF data
echo $pdf_data;


// Close the database connection and include footer
$conn->close();
include('footer.php');
?>
