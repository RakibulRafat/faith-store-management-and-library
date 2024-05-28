<?php
include("header.php");



if (isset($_POST['submit'])) {
    //die("Test");
    $username = $_POST["uname"];
    $password = $_POST["pass"];
    $result = mysqli_query($conn, "Select * from users where uname = '".$username."' " );
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
        //die($username.'==='.$password.'==='.$row["password"]);
        if($password == $row["password"]){
           //die($_session.'==='.$_session.'==='.$row["uid"]);
            $_SESSION["login"] = true;
            $_SESSION["uid"] = $row["uid"];
            $_SESSION["uname"] = $row["uname"];
            $_SESSION["group_id"] = $row["group_id"];
             //die($_session.'==='.$_session.'==='.$row["uid"]);
           if($row['group_id']=='1')
             header("Location: home.php");
             else
             header("location: home.php");
         
        }
        else{
            echo "<script> alert ('Wrong Password'); </script>";
        }
    }

}
?>



    <div >
        <h2 class="centered-heading">Login</h2>
        <form action="" method="POST" class="custom-form">
            <label for="username">Username:</label>
            <input type="text" name="uname" required><br><br>

            <label for="password">Password:</label>
            <input type="password" name="pass" required><br>

            <button  class="btn btn-success" type="submit" name="submit" value="Login">Login</button><br><br>
            <li><a href = 'registration.php' class="regi">Registration</a></li>
        </form>
    </div>

<?PHP include('footer.php'); ?>
