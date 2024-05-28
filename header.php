<?php session_start(); 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_faithstore";

// Create Connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
     die(mysqli_error($conn));
  } 

?>
<!DOCTYPE html>
<html>

<head>
    <title>Faith Store Management System</title>
    
    <link rel="stylesheet"
		href=
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">

</head>
<body>
    
    <header>
        <nav>
        <div class="container">
            <div><img src="faith_logo_large.png" alt="faith_logo_large.png" class="logo" onclick="location.href = 'home.php';" > </div>

            <div class="searchContainer">
            
            <?php


              echo '<div>
            <form action="search.php" method="get" id="searchForm">
            <input type="text" name="ptitle" placeholder="Search...">
            <button type="submit">Search</button>
            </form>
            </div>';
            

            echo "<ul class='menu'>";

            if(isset($_SESSION['uname'])){
                echo '<li> <a href="uprofile.php">' .$_SESSION["uname"] .'</a></li>';
             //print_r($_SESSION);
             }
             else
               echo "<li><a href = 'registration.php'>Registration</a></li>";
               if(isset($_SESSION['uid']))
               echo "<li><a href = 'logout.php'>LogOut</a></li>";
         else
               echo "<li><a href = 'login.php'>LogIn</a></li>";


               echo "</ul>";


             ?>

            </div>
</nav>
            
            <nav>
                <ul class="menu">
                    <?php
                  //print_r($_SESSION['group_id']);
                    if(isset($_SESSION['uid'])){


                        

                        
                        if($_SESSION['group_id'] == 3){
                            echo '<li><a href="HOME.php">Home</a></li>';
                            echo '<li><a href="request.php">Request Product</a></li>';
                            echo '<li><a href="libraryhome.php">Library</a></li>';
                        }

                        if($_SESSION['group_id'] == 2){ 
            
                       echo '<li><a href="HOME.php">Home</a></li>';
                       echo '<li><a href="itemadd_form.php">Add Product</a></li>';
                       echo '<li><a href="managebk.php">Manage Books</a> </li>';
                       echo '<li><a href="productmngmnt.php">Product Management</a></li>';
                       echo '<li><a href="bkmngmnt.php">Book Management</a></li>';
                       echo '<li><a href="loadprdct.php">View Products</a </li>';
                       echo '<li><a href="chartprdrprt.php">Product Report</a></li>';
                       
                       
                       
                        }
                       if($_SESSION['group_id'] == 1){
                        echo '<li><a href="HOME.php">Home</a></li>';
                        echo '<li><a href="itemadd_form.php">Add Product</a></li>';
                        echo '<li><a href="managebk.php">Manage Books</a> </li>';
                        echo '<li><a href="productmngmnt.php">Product Management</a></li>';
                        echo '<li><a href="bkmngmnt.php">Book Management</a></li>';
                        echo '<li><a href="loaduser.php">View Users</a </li>';
                        echo '<li><a href="loadprdct.php">View Products</a </li>';  
                        echo '<li><a href="chartprdrprt.php">Product Report</a></li>';
                        echo '<li><a href="chartuserrprt.php">User Report</a></li>';
                        echo '<li><a href="dashboard.php">Admin Dashboard</a></li>';
                        
                    }
                    
           
                    } 
                    
                    
                       
                    ?>
                </ul>
                
            </nav>
                
       
    </header>
  
<script>
// Retrieve the search keyword from the URL and set the search input value
document.addEventListener("DOMContentLoaded", function() {
    var searchInput = document.getElementById("ptitle");
    var idInput = document.getElementById("pid");
    var searchParams = new URLSearchParams(window.location.search);
    var searchKeyword = searchParams.get("ptitle");
    var id = searchParams.get("pid");

    if (searchKeyword) {
        searchInput.value = searchKeyword;
    }
    if (id) {
        idInput.value = id;
    }
});

// Add an event listener to the form to handle search submission
document.getElementById("searchForm").addEventListener("submit", function(event) {
    // Retrieve the search keyword from the input field
    var searchKeyword = document.getElementById("ptitle").value;
    var id = document.getElementById("pid").value;

    // Modify the action attribute of the form to include the search query
    this.action = "?" + new URLSearchParams({ ptitle: searchKeyword, pid: id, }).toString();
});
function validateForm() {
    var ititle = document.getElementById("iname");
    var icat = document.getElementById("icg");
    var tarea = document.getElementById("ta");
    var price = document.getElementById("prc");
    var g = document.getElementById("Gift");
    var h = document.getElementById("Homemade");
    var o = document.getElementById("Others");
    var Quatity = document.getElementById("Quantity");
    var com = document.getElementById("comment");
    var loc = document.getElementById("location");
   


    if (ititle.value == "" || icat.value == "" || tarea.value == "" || p.value =="" || g.value =="" || h.value =="" || o.value =="" ||com.value ==""|| loc.value=="") {
      alert("Every field must be filled out");
      return false;
    }
    else{
        true; 
    }
  }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script> 
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>  
<!-- Content Goes Here -->

   

