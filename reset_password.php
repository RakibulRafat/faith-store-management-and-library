<?php 
include('header.php');

if(isset($_POST['resetpass']))
{
    $email = mysqli_real_escape_string($conn, $_POST['email']);
}


?>