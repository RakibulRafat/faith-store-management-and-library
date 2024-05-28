<?php
include('header.php');


 $id = $_GET['id'];
 $sql = "SELECT * FROM product WHERE pid = $id ";
 $result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
    $imgFileName = $product["pimage"];
    $imgPath ='img/' . $imgFileName;

    if (file_exists($imgPath)) {
        echo "<td><img src='$imgPath' width='100'></td>";
    } else {
        echo "Image not found: $imgFileName";
    }

    // Display the rest of the user's information
    echo '<p><strong>Name:</strong> ' . $product['pname'] . '</p>';
    echo '<p><strong>Category:</strong> ' . $product['catid'] . '</p>';
    echo '<p><strong>Active Status:</strong> ' . $product['active_status'] . '</p>';
    echo '<p><strong>Quantity</strong> ' . $product['quantity'] . '</p>';
    echo '<p><strong>Expired Date:</strong> ' . $product['expired_date'] . '</p>';
    // echo '<p><strong>Phone Number:</strong> ' . $product['phone'] . '</p>';
    // echo '<p><strong>Password:</strong> ' . $product['password'] . '</p>';
}
// Query to fetch Product data
$sql1 = "SELECT pid, pname FROM product";
$result = $conn->query($sql1);
?>
<form class="custom-form" action="assigninsert.php" method="post" onsubmit="return validateForm()">
<?php
// Check if there are results
if ($result->num_rows > 0) {
    // Create a dropdown list
    echo'<label for="select">Products</label><br>';
    echo '<select name="pdropdown"><br>';
    echo'<option>Select Product</option><br>';
    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row['pid'] . '">' . $row['pname'] . '</option>';
    }
    echo '</select>';
} else {
    echo "No data found";
}
// Query to fetch Product data
$sql2 = "SELECT uid, uname FROM users";
$result = $conn->query($sql2);
// Check if there are results
if ($result->num_rows > 0) {
    // Create a dropdown list
    echo'<label for="select">Users</label><br>';
    echo '<select name="udropdown"><br>';
    echo'<option>Select User</option><br>';
    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row['uid'] . '">' . $row['uname'] . '</option>';
    }
    echo '</select>';
} else {
    echo "No data found";
}

?>
<label for="datetime-local">Assign Date</label><br>
<input type="datetime-local" name="AssignDate" id="Date" value="Date"><br><br>
<label for="datetime-local">Return Date</label><br>
<input type="datetime-local" name="Returndate" id="Date" value="Date"><br><br>
<label for="input">Location</label>
<input id="loc" name="loc" type="text" value="" placeholder="Location"><br><br>
<label for="input">Quantity</label>
<input id="quantity" name="quantity" type="number" value="" placeholder="Quantity"><br><br>
<label for="input">Comment</label>
<input id="com" name="com" type="text" value="" placeholder="Comment"><br><br>
<input type="hidden" value="1" name="getSubmit">
<button type="submit" name="submit" value="submit">Submit</button>
</form>
<?php
mysqli_close($conn);
?>
<script>
 function validateForm() {
   
    var comment = document.getElementById("com");
    var location = document.getElementById("loc");
   


    if (comment.value ==""|| location.value=="") {
      alert("Every field must be filled out");
      return false;
    }
    else{
        true; 
    }
  }
</script>


