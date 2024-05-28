<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php 
include('header.php');
require('dbconnect.php');
include('footer.php');


$sql = "SELECT * FROM product";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    // Create an HTML table
    echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category ID</th>
            <th>Description</th>
            <th>Color</th>
            <th>Source</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Purchase Date</th>
            <th>Purchase Person</th>
            <th>Exp Date</th>
        </tr>";

    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["pid"] . "</td>";
        echo "<td>" . $row["pname"] . "</td>";
        echo "<td>" . $row["catid"] . "</td>";
        echo "<td>" . $row["pdescription"] . "</td>";
        echo "<td>" . $row["color"] . "</td>";
        echo "<td>" . $row["item_source"] . "</td>";
        echo "<td>" . $row["quantity"] . "</td>";
        echo "<td>" . $row["price"] . "</td>";
        echo "<td>" . $row["purchase_date"] . "</td>";
        echo "<td>" . $row["purchase_person"] . "</td>";
        echo "<td>" . $row["expired_date"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "0 results";
}



mysqli_close($conn);
?>



</body>
</html>
