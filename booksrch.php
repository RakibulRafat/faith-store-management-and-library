<?php
include('header.php');
?>
<form action="booksrch.php" method="get" id="searchForm">
    <input type="text" name="book_id" placeholder="Search By Book ID...">
    <input type="text" name="book_tittle" placeholder="Search By Book Name...">
    <input type="text" name="author" placeholder="Search By Author Name...">
    <input type="text" name="publisher" placeholder="Search By Publisher Name...">
    <button type="submit">Search</button>
</form>

<script>
// Retrieve the search keyword from the URL and set the search input value
document.addEventListener("DOMContentLoaded", function() {
    var searchInput = document.getElementById("book_tittle");
    var searchParams = new URLSearchParams(window.location.search);
    var searchKeyword = searchParams.get("book_tittle");

    if (searchKeyword) {
        searchInput.value = searchKeyword;
    }
});

// Add an event listener to the form to handle search submission
document.getElementById("searchForm").addEventListener("submit", function(event) {
    // Retrieve the search keyword from the input field
    var searchKeyword = document.getElementById("book_tittle").value;

    // Modify the action attribute of the form to include the search query
    this.action = "?" + new URLSearchParams({ book_tittle: searchKeyword }).toString();
});
</script>
<?php

// Retrieve the search query from the URL
$bid = isset($_GET['book_id']) ? $_GET['book_id']:0;
$btitle = isset($_GET['book_tittle']) ? $_GET['book_tittle']:'';
$author = isset($_GET['author']) ? $_GET['author']: '';
$publisher = isset($_GET['publisher']) ? $_GET['publisher'] : 0;


print_r($_GET);
$filter = ($bid > 0)?' AND book_id ='. $bid.' ' :' ';
$filter  .= ($btitle > 0)?" AND book_tittle LIKE '%$btitle%' " : ' ';
$filter  .= ($author > 0)?" AND author LIKE '%$author%' " : ' ';
$filter .= ($publisher > 0) ? ' AND publisher =' . $publisher . ' ' : '';

// Perform the search query (modify the SQL query according to your database structure)
$sql = "SELECT b.*, book_tittle FROM books b WHERE 1=1 $filter ";
//die($sql);

$result = $conn->query($sql);

// Display search results
echo '<h2>Search Results:</h2>';

if (mysqli_num_rows($result) > 0) {
    // Create an HTML table
    echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Author</th>
            <th>Publisher</th>
        </tr>";

    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["book_id"] . "</td>";
        echo "<td>" . $row["book_tittle"] . "</td>";
        echo "<td>" . $row["author"] . "</td>";
        echo "<td>" . $row["publisher"] . "</td>";
        echo "<td><img class='uimg' src='".$row["cover"]."' width='80'></td>"; 
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "0 results";
}

// Close the database connection
$conn->close();
?>


