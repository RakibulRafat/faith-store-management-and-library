<?php include('header.php'); ?>


    <div id="userlist" ></div>
<?php


// Pagination variables
$limit = 5; // Number of records per page
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$start_from = ($current_page - 1) * $limit;

$sql = "SELECT product.pid, catagory.cat_title, product.pname FROM product Inner JOIN catagory ON product.catid = catagory.catid LIMIT $start_from, $limit ;";
$result = mysqli_query($conn, $sql);

echo "<button class='button'><a href='itemadd_form.php'>Add Product</a></button>";




if (mysqli_num_rows($result) > 0) {
  // Create an HTML table
  echo "<table border='1'>
      <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Category</th>
          
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
      
      //echo "<td>" . $row["store"] . "</td>";
      echo "<td><button title = 'view' value=". $row['pid'] ." class='loaduser'>View</button></td>";
      echo "<td><a href='deleteprod.php?id=" . $row["pid"] . "' class='btn btn-danger'>Delete</a></td>";
      echo "<td><a href='updatefrm.php?id=" . $row["pid"] . "' class='btn btn-primary'>Edit</a></td>";
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
       echo "<li class='$active_class'><a href='productmngmnt.php?page={$i}'>{$i}</a></li>";
   }
   echo "</ul>";



} else {
  echo "0 results";
}

mysqli_close($conn);

 include('footer.php');
?>
 <script> 
        $(document).ready(function () {
            $(".loaduser").click(function () {
                var vad =this.value;
                
                $.ajax({
                    url: "itemselec.php?id="+vad,
                    type: "GET",
                    success: function (data) {
                        try {
                           
                            $("#userlist").html(data)//.animate({
//     left: '250px',
//     opacity: '0.5',
//     height: '150px',
//     width: '150px'
//   });;
                        } catch (error) {
                            console.log("Error parsing JSON:", error);
                        }
                        
                        
                    },
                    error: function () {
                        console.log("Error fetching product list");
                    }
                });
            });
        });
    </script>  
