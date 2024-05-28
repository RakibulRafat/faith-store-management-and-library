<?php
  
  include('header.php');  


if(isset($_POST['submit'])){
  $Name = $_POST["uname"];
  $group = $_POST["type"];
  $Email = $_POST["email"];
  $Address = $_POST["address"];
  $Date = $_POST["DOB"];
  $Phone = $_POST["Phone"];
  $Password = $_POST["pass"];


  $sql = "INSERT INTO users (uname, group_id, email, address, dob, phone, password)
  VALUES ('$Name', '$group', '$Email', '$Address', '$Date', '$Phone', '$Password')";
  $result=mysqli_query($conn,$sql);
  if($result){
      echo "You Registered Successfully";
  }else{
      die(mysqli_error($conn));
  }

}

echo "<p>Now click the bitton for Login</p><br>";
echo "<a href='login.php'>Login</a>";


$conn->close();

 include('footer.php');
?>