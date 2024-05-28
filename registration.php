<?php
  include('header.php');



if (isset($_POST['submit'])) {
   $Name = $_POST["uname"];
   $group = $_POST["type"];
   $Email = $_POST["email"];
   $Address = $_POST["address"];
   $Date = $_POST["DOB"];
   $Phone = $_POST["Phone"];
   $Password = $_POST["pass"];

   // Handle file upload
   $pp = $_FILES["pp"];
   $targetDir = "img/"; // Set the directory where you want to store uploaded files
   $targetFile = $targetDir . basename($pp["name"]);
   $uploadOk = 1;
   
   // Check if file is a valid image
   $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
   if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
       echo "<script>alert('Invalid file format. Only JPG, JPEG, and PNG files are allowed.');</script>";
       $uploadOk = 0;
   }

   // Check for file upload errors
   if ($uploadOk == 1) {
       if (move_uploaded_file($pp["tmp_name"], $targetFile)) {
           // File uploaded successfully, continue with the database insert
           // Add the $targetFile to the database as the profile picture path
           $sql = "INSERT INTO users (uname, group_id, email, address, dob, phone, password, pp)
           VALUES ('$Name', '$group', '$Email', '$Address', '$Date', '$Phone', '$Password', '$targetFile')";
          echo "($sql)";
           if (mysqli_query($conn, $sql)) {
               echo "<script>alert('Registration Successful');</script>";
               
           } else {
               echo "<script>alert('Database error: " . mysqli_error($conn) . "');</script>";
           }
       } else {
           echo "<script>alert('File upload failed.');</script>";
       }
   }
}



?>


<h2 class="text-center">Registration Form </h2>


<form onsubmit="return validateForm()" action="" method="POST" enctype="multipart/form-data" class="custom-form" autocomplete="off">

           <label for="text">Name</label>
           <input type="text" name="uname" Value="" placeholder="Enter Your Name"><br><br>

           <?php

// Get all the categories from category table
$sql = "SELECT * FROM user_group" ;
$all_groups = mysqli_query($conn, $sql);

// The following code checks if the submit button is clicked 
// and inserts the data in the database accordingly
if(isset($_POST['submit']))
{
// Store the Product name in a "name" variable
$name = mysqli_real_escape_string($conn,$_POST['uname']);

// Store the Category ID in a "id" variable
$id = mysqli_real_escape_string($conn,$_POST['user_group']); 

// Creating an insert query using SQL syntax and
// storing it in a variable.
$sql_insert = 
"INSERT INTO `users`(`uname`, `group_id`)
VALUES ('$name','$id')";

// The following code attempts to execute the SQL query
// if the query executes with no errors 
// a javascript alert message is displayed
// which says the data is inserted successfully
if(mysqli_query($conn,$sql_insert))
{
//echo '<script>alert(" Registration successful")</script>';
header("location: login.php");
}
}
$conn->close();
?>

           <label for="select">Choose One</label>
      <select id="type" name="type">
            <option value ="grp">User Group</option>
            <option value ="1">Admin</option>
            <option value ="2">Official</option>
            <option value ="3">Consumer</option>
      </select><br><br>

         <label for="email">Email</label>
         <input type="email" name="email" placeholder="Enter Your Email"><br><br>

         <label for="text">Address</label>
         <input type="text" name="address" placeholder="Enter Your Address"><br><br>

         <label for="Date">DOB</label>
         <input type="Date" name="DOB" placeholder="Enter Your Date Of Birth"><br><br>

         <label for="number">Phone</label>
         <input type="number" name="Phone" placeholder="Enter Your Phone Number"><br><br>

         <label for="password">Password</label>
         <input type="password" name="pass" placeholder="Enter Your Password"><br><br>


         <label for ="pp">Upload Profile Picture</label>
       <input type="file" name="pp" id="image" accept=".jpg, .jpeg, .png" value =""><br>
        <br>


         <button class="btn-primary" type="submit" name="submit">Submit</button>

</form>
</div>
</div>
<?php include('footer.php');?>

