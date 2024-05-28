<?php 
include('header.php');
?>


    <h2>User Profile</h2>

    <?php

    // Assuming you have a user authentication system and have obtained the user's ID
    $user_id = $_SESSION['uid'];; // Replace with the actual user's ID

    // Fetch user data from the database
    $sql = "SELECT * FROM users WHERE uid =  $user_id";
    $result = $conn->query($sql);
    //print_r('$result');

    

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $imgFileName = $user["pp"];
        $imgPath ='' . $imgFileName;
    
        if (file_exists($imgPath)) {
            echo "<td><img class='uimg' src='$imgPath' width='200'></td>";
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
        echo '<p><strong>Password:</strong> ' . $user['password'] . '</p>';
    }

    // Close the database connection
    $conn->close();
    ?>

    <a href="profedit.php">Edit Profile</a>

    <?php include('footer.php');?>

