<?php

  include('header.php');

$sql = "SELECT product.pid, catagory.cat_title, product.pname FROM product INNER JOIN catagory ON product.pid=catagory.catid;";
$result = mysqli_query($conn, $sql);

echo "<button class='button'>Add Product</button>";

if (mysqli_num_rows($result) > 0) {
    // Create an HTML table
    echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Store</th>
            <th>View</th>
            <th>Delete</th>
            <th>Edit<th>
        </tr>";

    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["pid"] . "</td>";
        echo "<td>" . $row["pname"] . "</td>";
        echo "<td>" . $row["cat_title"] . "</td>";
        echo "<td>" . $row["store_id"] . "</td>";
        echo "<td><a href='trylogin.php?id=" . $row["pid"] . "'>View</a></td>";
        echo "<td><a href='deleteprod.php?id=" . $row["pid"] . "'>Delete</a></td>";
        echo "<td><a href='updateprod.php?id=" . $row["pid"] . "'>Edit</a></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "0 results";
}

mysqli_close($conn);

   include('footer.php');
?>
