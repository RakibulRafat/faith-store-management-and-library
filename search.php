<?php include('header.php'); ?>

    <!-- <style>
        /* Style to display the input boxes and button side by side */
        form {
            display: flex;
            gap: 10px; /* Adjust the gap between input boxes */
        }
    </style> -->




    <form method="get" action="search.php" id="searchForm">
        
    <label for="pid">Product ID:</label>
    <input type="text" name="pid" id="pid" placeholder="Enter Product ID">

    <label for="ptitle">Name:</label>
    <input type="text" name="ptitle" id="ptitle" placeholder="Enter Product Name">

    <label for="catid">Category ID:</label>
    <input type="text" name="catid" id="catid" placeholder="Enter Catagory ID">

    <label for="book_id">Book ID:</label>
    <input type="text" name="book_id" id="book_id" placeholder="Enter Book ID">

            <!-- Fetch data from the database -->
            <?php
               $sql = "SELECT cat_title FROM catagory";
               $result = $conn->query($sql);
              ?>

       <!-- Create the dropdown list -->
          <select name="Item">
          <option>Select Catagory</optiom>
          <?php
           while ($row = $result->fetch_assoc()) {
            
            echo "<option value='" . $row['cat_title'] . "'>" . $row['cat_title'] . "</option>";
         }
          
        //  if(isset(option value="")){
        //     
        //  //print_r($_SESSION);
        //  }
         ?>
</select>
            <button type="submit">Search</button>

        </form><br>




        
<?php



// Retrieve the search query from the form
$pid = isset($_GET['pid']) ? $_GET['pid'] : 0;
$ptitle = isset($_GET['ptitle']) ? $_GET['ptitle'] : '';
$cid = isset($_GET['catid']) ? $_GET['catid'] : 0;
$bookid = isset($_GET['book_id']) ? $_GET['book_id'] : 0;


$filter = ($pid > 0) ? ' AND p.pid =' . $pid . ' ' : '';
$filter .= ($ptitle != '') ? " AND p.pname LIKE '%$ptitle%' " : '';
$filter .= ($cid > 0) ? ' AND p.catid =' . $cid . ' ' : '';
$filter = ($bookid > 0) ? ' AND b.book_id =' . $bookid . ' ' : '';
$bktittle = isset($_GET['book_tittle']) ? $_GET['book_tittle'] : '';

// Perform the search query with a JOIN on the category table
$sql = "SELECT p.*, c.cat_title FROM product p
        LEFT JOIN catagory c ON p.catid = c.catid
        WHERE 1=1 $filter ";

// Display search results
echo '<h2>Search Results:</h2>';

$result = $conn->query($sql);

if (mysqli_num_rows($result) > 0) {
    // Create an HTML table
    echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Purchase Person</th>
            <th>Active Status</th>
            <th>Purchase Date</th>
            <th>Expired Date</th>
        </tr>";

    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["pid"] . "</td>";
        echo "<td>" . $row["pname"] . "</td>";
        echo "<td>" . $row["cat_title"] . "</td>";
        echo "<td>" . $row["price"] . "</td>";
        echo "<td>" . $row["quantity"] . "</td>";
        echo "<td>" . $row["purchase_person"] . "</td>";
        echo "<td>" . $row["active_status"] . "</td>";
        echo "<td>" . $row["purchase_date"] . "</td>";
        echo "<td>" . $row["expired_date"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "0 results";
}

// Close the database connection
$conn->close();

include('footer.php');
?>


