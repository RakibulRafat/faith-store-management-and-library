<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel ="stylesheet" href="style.css">
</head>

<?php

   include('header.php');

    $Name = $_GET["title"];
    $Catagory = $_GET["Item"];
    $Type = $_GET["Type"];
    $Color = $_GET["Color"];
    $Description = $_GET["Description"];
    $Quantity = $_GET["Quantity"];
    $Store = $_GET["store1"];
    $Item_Source = $_GET["ItemSource"];
    $Active_Status = $_GET["ActiveStatus"];
    $Entry_Date = $_GET["EntryDate"];
    $Expired_date = $_GET["ExpDate"];
    $Price = $_GET["price"];


	require_once('dbconnect.php');

	$conn = mysqli_connect($servername, $username, $password, $dbname);

		
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 



	mysqli_query( $connect, "INSERT INTO products VALUES ( NULL, '$Name', '$Catagory', '$Type', '$Color', '$Description', '$Quantity', '$Store', '$Item_Source', '$Active_Status', '$Entry_Date', '$Expired_date', '$Price' )" )

		or die("Can not execute query");



	echo "Record inserted:<br> Name = $Name <br> Catagory = $Catagory <br> Type = $Type <br> Color = $Color <br> Description = $Description <br> Quantity = $Quantity <br> Store = $Store <br> Source = $Item_Source <br> Status = $Active_Status <br> Entry = $Entry_Date <br> <br> Validity = $Expired_date <br> Price = $Price ";



	echo "<p><a href=item_store.php>READ all records</a>";

 
    include('footer.php');  

    ?>



</body>
</html>