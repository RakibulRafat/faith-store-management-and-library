<?php
include('header.php');

// Query to fetch data
$sql = "SELECT pid, pname FROM product";
$result = $conn->query($sql);
?>
<form class="custom-form" action="trybook.php">
<?php
// Check if there are results
if ($result->num_rows > 0) {
    // Create a dropdown list
    echo'<label for="select">Products</label><br>';
    echo '<select name="dropdown"><br>';
    echo'<option>Select Product</option><br>';
    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row['pid'] . '">' . $row['pname'] . '</option>';
    }
    echo '</select>';
} else {
    echo "No data found";
}
?>
<label for="datetime-local">Request Date</label><br>
<input type="datetime-local" name="ReqDate" id="ReqDate" value="Date"><br><br>
<label for="input">Total</label>
<input id="total" name="total" type="text" value="" placeholder="Quantity"><br><br>
<button type="submit" name="submit" value="submit">Submit Request</button>
</form>
<?php
mysqli_close($conn);
?>




