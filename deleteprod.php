<?php
 
  include('header.php');


 //echo '<button onclick="deleteRecord()">Delete Record</button>

  //<script type="text/javascript">
      //function deleteRecord() {
         // var del = confirm("Are you sure you want to delete this record?");
          //if (del) {
              // Redirect to a PHP script that performs the deletion
            //  window.location.href = "productmngmnt.php?pid=<?php echo $id; ";
            
    // Get the product ID to be deleted (you can obtain this from a form or URL parameter)
$product_id = $_GET['pid']; // Replace with the actual source of product ID

// Prepare a SQL statement using a parameterized query
$sql = "DELETE FROM product WHERE pid? =$product_id ";
$stmt = $conn->prepare($sql);

if ($stmt) {
    // Bind the product ID to the parameter
    $stmt->bind_param("i", $product_id); // "i" represents an integer

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "Product with ID $product_id has been deleted successfully.";
    } else {
        echo "Error executing the query: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
} else {
    echo "Error preparing the query: " . $conn->error;
}

// Close the database connection
$conn->close();

include('footer.php');
?> 