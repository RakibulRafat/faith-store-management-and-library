<?php include('header.php');?>

    <h2 class="centered-heading fade-in">Edit Profile</h2>


    <style>

         /* Styles for centering and animating the heading */
    .centered-heading {
        text-align: center;
    }



        /* Styles for the custom form */
        .custom-form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            position: relative;
            overflow: hidden;
            animation: backgroundAnimation 10s linear infinite;
        }

        .custom-form label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
    
        }

        .custom-form input[type="text"],
        .custom-form input[type="email"],
        .custom-form input[type="Date"],
        .custom-form input[type="number"],
        .custom-form input[type="password"],
        .custom-form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .custom-form button {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .custom-form button:hover {
            background-color: #0056b3;
        }

            </style>





    <?php
    //$id = $_GET['uid'];
   

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Handle the form submission to update user information

        // Assuming you have a user authentication system and have obtained the user's ID
        $user_id =  $_SESSION['uid']; // Replace with the actual user's ID

        // Get updated user data from the form
        $Name = $_POST["uname"];
        $group = $_POST["type"];
        $Email = $_POST["email"];
        $Address = $_POST["address"];
        $Date = $_POST["DOB"];
        $Phone = $_POST["Phone"];
        $Password = $_POST["pass"];

        // Update user data in the database
        $sql = "UPDATE users SET uname = '$Name', group_id = '$group', email = '$Email', address = '$Address', DOB = '$Date', phone = '$Phone', password = '$Password' WHERE uid = $user_id";

        if ($conn->query($sql) === true) {
            echo "<script> 'Profile updated successfully.' </script>";
        } else {
            echo "Error updating profile: " . $conn->error;
        }
    } else {
        // Display the edit profile form

        // Fetch the current user data from the database
        $user_id = $_SESSION['uid']; // Replace with the actual user's ID
        $sql = "SELECT * FROM users WHERE uid = $user_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
        } else {
            echo "User not found or not logged in.";
        }
    }
    ?>

    <form method="post" action="profedit.php" class="custom-form">
    <label for="text">Name</label>
           <input type="text" name="uname" ><br>

           <label for="select">Choose One</label>
      <select id="type" name="type" >
            <option Value='1'<?php echo($group==1)?'selected':'';?>>Admin</option>
            <option Value='2'<?php echo($group==2)?'selected':'';?>>Official</option>
            <option value='3'<?php echo($group==3)?'selected':'';?>>Consumer</option>
      </select><br><br>

         <label for="email">Email</label>
         <input type="email" name="email"><br><br>

         <label for="text">Address</label>
         <input type="text" name="address"><br><br>

         <label for="Date">DOB</label>
         <input type="Date" name="DOB"><br><br>

         <label for="number">Phone</label>
         <input type="number" name="Phone"><br><br>

         <label for="password">Password</label>
         <input type="password" name="pass"><br><br>


         <button type="submit" name="submit">Submit</button>

    </form>

<?php include('footer.php');?>    
