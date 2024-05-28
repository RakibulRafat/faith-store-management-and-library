<?php include('header.php');?>


      <style>
        /* Style to display the input boxes and button side by side */
        form {
            display: flex;
            gap: 10px; /* Adjust the gap between input boxes */
        }
        ul.pagination {
        display: inline-block;
        padding: 0;
        margin: 20px 0;
        text-align: center; /* Center the pagination buttons */
    }

    ul.pagination li {
        display: inline;
        margin-right: 5px;

    }

    ul.pagination li a {
        color: #333;
        padding: 8px 12px;
        text-decoration: none;
        background-color: #f5f5f5;
        border: 1px solid #ddd;
        border-radius: 3px;
    }

    ul.pagination li a:hover {
        background-color: #ddd;
    }

    ul.pagination li.active a {
        background-color: #007bff;
        color: #fff;
    }
    </style> 

<form method="get" action="search.php">
    <label for="pid">Product ID:</label>
    <input type="text" name="pid" id="pid" placeholder="Enter Product ID">

    <label for="ptitle">Name:</label>
    <input type="text" name="ptitle" id="ptitle" placeholder="Enter Product Name">

    <label for="catid">Category ID:</label>
    <input type="text" name="catid" id="catid" placeholder="Enter Catagory ID">

            <!-- Fetch data from the database -->
            <?php
               $sql = "SELECT cat_title FROM catagory";
               $result = $conn->query($sql);
              ?>

       <!-- Create the dropdown list -->
          <select name="Item">
          echo "<option>Select Catagory</optiom>";
          <?php
          
           while ($row = $result->fetch_assoc()) {
            
            echo "<option value='" . $row['cat_title'] . "'>" . $row['cat_title'] . "</option>";
         }
         ?>
</select>
            <button type="submit">Search</button>

        </form>


<?php
//$sqluser="SELECT COUNT(aid) as total, assigned.uid, users.uname FROM assigned LEFT JOIN users ON assigned.uid=users.uid GROUP BY users.uid;";
//$id=$_GET['id'];
//var_dump($id);
//die($id);
// Pagination variables
$limit = 5; // Number of records per page
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$start_from = ($current_page - 1) * $limit;

$sql = "SELECT p.*, c.cat_title, GROUP_CONCAT(u.uname) AS user_names, SUM(IF(a.pid > 0, 1, 0)) AS assigned_count
 FROM product p LEFT JOIN catagory c ON p.catid = c.catid LEFT JOIN assigned a ON a.pid = p.pid 
 LEFT JOIN users u ON u.uid = a.uid GROUP BY p.pid  
LIMIT $start_from, $limit;";

$result = mysqli_query($conn, $sql);
var_dump($result);
if (mysqli_num_rows($result) > 0) {
    // Create an HTML table
    echo "<table border='1' class='table table-bordered border-primary'>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Photo</th>
            <th>Photo1</th>
            <th>Photo2</th>
            <th>Photo3</th>
            <th>Category </th>
            <th>Description</th>
            <th>Color</th>
            <th>Source</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Purchase Date</th>
            <th>Purchase Person</th>
            <th>Exp Date</th>
            <th>Product Assign</th>
            <th>Assigned Users Name</th>
            </tr>";

    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["pid"] . "</td>";
        echo "<td>" . $row["pname"] . "</td>";
        echo "<td><img class='pimg' src='img/".$row["pimage"]."'></td>";
        echo "<td><img class='pimg' src='img/".$row["pimage1"]."'></td>";
        echo "<td><img class='pimg' src='img/".$row["pimage2"]."'></td>";
        echo "<td><img class='pimg' src='img/".$row["pimage3"]."'></td>";
        echo "<td>" . $row["cat_title"] . "</td>";
        echo "<td>" . $row["pdescription"] . "</td>";
        echo "<td>" . $row["color"] . "</td>";
        echo "<td>" . $row["item_source"] . "</td>";
        echo "<td>" . $row["quantity"] . "</td>";
        echo "<td>" . $row["price"] . "</td>";
        echo "<td>" . $row["purchase_date"] . "</td>";
        echo "<td>" . $row["purchase_person"] . "</td>";
        echo "<td>" . $row["expired_date"] . "</td>";
        
        $currentDate = date("Y-m-d H:i:s");
        $timestamp1 = strtotime($currentDate);
        //$timestamp2 = strtotime($row["end_date"]);

if (array_key_exists("end_date", $row) && $currentDate > $row["end_date"]) {
    // Output information that the product is expired and no longer assigned
    echo "<td>Expired</td>";
    echo "<td>No longer assigned</td>";
} else {
    // Your existing code for displaying the Assign link and assigned users
    echo "<td> <a href='javascript:void(0);' onclick=\"window.open('assign.php?id=" . $row["pid"] . "', '_blank', 'width=800,height=500,scrollbars=yes,status=no,resizable=no,screenx='+(screen.width-800)/2+',screeny='+(screen.height-500)/2+'');\" class='regi'  title='Assign' value=". $row['pid'] .">Assign (".$row['assigned_count'].")</a></td>";
    echo "<td>" . $row["user_names"] . "</td>";
}
    
    echo "</tr>";
        //echo "<td> <a href='javascript:void(0);' onclick=\"window.open('assign.php?id=" . $row["pid"] . "', '_blank', 'width=800,height=500,scrollbars=yes,status=no,resizable=no,screenx='+(screen.width-800)/2+',screeny='+(screen.height-500)/2+'');\" class='regi'  title='Assign' value=". $row['pid'] .">Assign (".$row['assigned_count'].")</a></td>";
        //echo "<td>" . $row["user_names"] . "</td>";
        //echo "<td>" . $row[$sqluser] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
    // Pagination links
    $sql1 = "SELECT COUNT(pid) AS total FROM product";
    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($result1);
    $total_records = $row1['total'];
    $total_pages = ceil($total_records / $limit);


    echo "<ul class='pagination'>";
    for ($i = 1; $i <= $total_pages; $i++) {
        $active_class = ($i == $current_page) ? 'active' : '';
        echo "<li class='$active_class'><a href='showprdct.php?page={$i}'>{$i}</a></li>";
    }
    echo "</ul>";
} else {
    echo "0 results";
}
?>


<?php
mysqli_close($conn);

//include('footer.php');
?>
