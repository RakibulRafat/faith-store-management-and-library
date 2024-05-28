<?php
include('header.php');

$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE $id = uid";
$result = mysqli_query($conn, $sql);

//if (mysqli_num_rows($result) > 0) {
    // Create an HTML table
  //  echo "<table border='1'>
    //    <tr>
      //      <th>ID</th>
        //    <th>Name</th>
          //  <th>Group</th>
            //<th>Email</th>
           // <th>Address</th>
            //<th>Date Of Birth</th>
            //<th>Phone Number</th>
        //</tr>";

    // Output data of each row
    //while ($row = mysqli_fetch_assoc($result)) {
      //  echo "<tr>";
        //echo "<td>" . $row["uid"] . "</td>";
       // echo "<td>" . $row["uname"] . "</td>";
        //echo "<td>" . $row["group_tittle"] . "</td>";
     //   echo "<td>" . $row["email"] . "</td>";
       // echo "<td>" . $row["address"] . "</td>";
       // echo "<td>" . $row["dob"] . "</td>";
       // echo "<td>" . $row["phone"] . "</td>";

    //}

    //echo "</table>";
//} else {
  //  echo "0 results";
//}

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $imgFileName = $user["pp"];
    $imgPath ='' . $imgFileName;

    if (file_exists($imgPath)) {
        echo "<td><img src='$imgPath' width='100'></td>";
    } else {
        echo "Image not found: $imgFileName";
    }

    // Display the rest of the user's information
    echo '<p><strong>Name:</strong> ' . $user['uname'] . '</p>';
    echo '<p><strong>Email:</strong> ' . $user['email'] . '</p>';
    echo '<p><strong>Group ID:</strong> ' . $user['group_id'] . '</p>';
    echo '<p><strong>Address:</strong> ' . $user['address'] . '</p>';
    echo '<p><strong>Date Of Birth:</strong> ' . $user['dob'] . '</p>';
    echo '<p><strong>Phone Number:</strong> ' . $user['phone'] . '</p>';
   // echo '<p><strong>Password:</strong> ' . $user['password'] . '</p>';
}



mysqli_close($conn);
?>
