<?php
   
   include('header.php');
   // Check if the user is logged in
if (!isset($_SESSION['uid'])) {
   // Redirect to the login page or handle the situation as needed
   header("Location: login.php");
   exit();
}
   
$id = $_GET['pid'];


$pname = $_POST["title"];
$catid = $_POST["Item"];
$description = $_POST["Description"];
$Color = $_POST["Color"];
$ptype = $_POST["Type"];
$item_source = $_POST["ItemSource"];
$active_status = $_POST["ActiveStatus"];
$Quantity = $_POST["Quantity"]; 
$Price = $_POST["price"];
$purchase_date = $_POST["EntryDate"];
$purchase_person = $_POST["person"];
$expired_date = $_POST["ExpDate"];
$updatedBy = $_SESSION['uid'];

//print_r($_POST);


// Corrected SQL query
$query = "UPDATE t0 SET pname='.$pname.', catid='.$catid' , pdescription='.$description.',Color='.$Color.', ptype='.$ptype.', item_source='.$item_source.', active_status='.$active_status.', quantity='.$Quantity.', price='.$Price.', purchase_date='.$purchase_date.', purchase_person='.$purchase_person.', expired_date='.$expired_date.', last_update_by='.$updatedBY.' ,  WHERE id = ".$id." ";

echo $query;

header("Location: itemselec.php");
//die();

//echo "<p><a href=itemselec.php>READ all records</a>";

mysqli_query($connect, $query) or die("Can not execute query");

echo "<p>Record updated:<br> id = ".$id." <br> pname = ".$name."";


include('footer.php');


?>
