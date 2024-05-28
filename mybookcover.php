<?php
include('header.php');

// Fetch all books
$sql = "SELECT * FROM books";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Book Title: " . $row["book_tittle"]. "<br>";
        echo "Author: " . $row["author"]. "<br>";
        echo "Publisher: " . $row["publisher"]. "<br>";
        echo "Publish Date: " . $row["publish_date"]. "<br>";
        echo "Total Copies: " . $row["total_copies"]. "<br>";
        echo "Book Source: " . $row["source"]. "<br>";
        echo "Entry Date: " . $row["book_entry_date"]. "<br>";
        echo "Description: " . $row["Description"]. "<br>";
        echo "Cover Image: <br><img src='img/".$row["cover"] . "' /><br>";
        // echo "PDF: <a href='download.php?book_id=" . $row["pdf"] . "'>Download PDF</a><br>"; // Assuming you have a separate PHP file to handle PDF downloads
        echo "<hr>";
    } 

} else {
    echo "No books found.";
}

include('footer.php');
?>
