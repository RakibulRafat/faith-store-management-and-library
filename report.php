<?php 
//include('header.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_faithstore";

// Create Connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
     die(mysqli_error($conn));
  } 


$sql = "SELECT COUNT(pid) as totalProduct, product.catid, catagory.cat_title FROM product LEFT JOIN catagory ON product.catid=catagory.catid GROUP BY product.catid;";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Create an HTML table
    echo "<table border='1'>
        <tr>
            <th>Category ID</th>   
            <th>Category</th>
            <th>Total Products</th>
        </tr>";
  
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["catid"] . "</td>";
        echo "<td>" . $row["cat_title"] . "</td>";
        echo "<td><a href='search.php?catid=".$row["catid"]."' class='report_a'>[".$row["totalProduct"]."]</a> </td>";
        
        
        //echo "<td>" . $row["store"] . "</td>";
        // echo "<td><button title = 'view' value=". $row['pid'] ." class='loaduser'>View</button></td>";
        // echo "<td><a href='deleteprod.php?id=" . $row["pid"] . "'>Delete</a></td>";
        // echo "<td><a href='updatefrm.php?id=" . $row["pid"] . "'>Edit</a></td>";
        echo "</tr>";
    }
  
    echo "</table>";
}
include("footer.php");
?>