<?php 
//include('header.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_faithstore";

// Create Connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
     die(mysqli_error($conn));
  } 

    
   

$sql = "SELECT COUNT(uid) as totalUsers, users.group_id, user_group.group_tittle FROM users LEFT JOIN user_group ON users.group_id=user_group.group_id GROUP BY users.group_id;";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Create an HTML table
    echo "<table border='1'>
        <tr>
            <th>User ID</th>
            <th>Group Name</th>
            <th>Total Users</th>
        </tr>";
  
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["group_id"] . "</td>";
        echo "<td>" . $row["group_tittle"] . "</td>";
        echo "<td><a href='usersrch.php?ugrp=".$row["group_id"]."' class='report_a'>[".$row["totalUsers"]."]</a> </td>";
        
        
        //echo "<td>" . $row["store"] . "</td>";
        // echo "<td><button title = 'view' value=". $row['pid'] ." class='loaduser'>View</button></td>";
        // echo "<td><a href='deleteprod.php?id=" . $row["pid"] . "'>Delete</a></td>";
        // echo "<td><a href='updatefrm.php?id=" . $row["pid"] . "'>Edit</a></td>";
        echo "</tr>";
    }
  
    echo "</table>";
}

include('footer.php')
?>

