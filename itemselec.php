<?php
 include("header.php"); 

// Make sure to validate and sanitize user input to prevent SQL injection
$x = (isset($_GET['id']))?$_GET['id']:0;

// Use proper SQL syntax in your query
$sql = "SELECT * FROM product WHERE pid = ".$x." ";
//echo $sql; die();
$result = mysqli_query($conn, $sql);
//die($sql);


if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) > 0) {
    // Create an HTML table
    echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Photo</th>
            <th>Photo1</th>
            <th>Photo2</th>
            <th>Photo3</th>
            <th>Category ID</th>
            <th>Description</th>
            <th>Color</th>
            <th>Source</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Purchase Date</th>
            <th>Purchase Person</th>
            <th>Exp Date</th>
            <th>Created BY</th>
        </tr>";

    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["pid"] . "</td>";
        echo "<td>" . $row["pname"] . "</td>";
        echo "<td><img src='img/" . $row["pimage"] . "' width='50'></td>";
        echo "<td><img src='img/" . $row["pimage1"] . "' width='50'></td>";
        echo "<td><img src='img/" . $row["pimage2"] . "' width='50'></td>";
        echo "<td><img src='img/" . $row["pimage3"] . "' width='50'></td>";
        echo "<td>" . $row["catid"] . "</td>";
        echo "<td>" . $row["pdescription"] . "</td>";
        echo "<td>" . $row["color"] . "</td>";
        echo "<td>" . $row["item_source"] . "</td>";
        echo "<td>" . $row["quantity"] . "</td>";
        echo "<td>" . $row["price"] . "</td>";
        echo "<td>" . $row["purchase_date"] . "</td>";
        echo "<td>" . $row["purchase_person"] . "</td>";
        echo "<td>" . $row["expired_date"] . "</td>";
        echo "<td>" . $row["created_by"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "0 results";
}

mysqli_close($conn);

//include('footer.php');
?>
