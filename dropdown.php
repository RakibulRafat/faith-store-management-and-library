<?php
include("header.php");

	// Get all the categories from category table
	$sql = "SELECT * FROM `catagory`";
	$all_categories = mysqli_query($con,$sql);

	// The following code checks if the submit button is clicked 
	// and inserts the data in the database accordingly
	if(isset($_POST['submit']))
	{
		// Store the Product name in a "name" variable
		$name = mysqli_real_escape_string($con,$_POST['Pname']);
		
		// Store the Category ID in a "id" variable
		$id = mysqli_real_escape_string($con,$_POST['Category']); 
		
		// Creating an insert query using SQL syntax and
		// storing it in a variable.
		$sql_insert = 
		"INSERT INTO `product`(`pname`, `catid`)
			VALUES ('$name','$id')";
		
		// The following code attempts to execute the SQL query
		// if the query executes with no errors 
		// a javascript alert message is displayed
		// which says the data is inserted successfully
		if(mysqli_query($con,$sql_insert))
		{
			echo '<script>alert("Product added successfully")</script>';
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0"> 
</head>
<body>
	<form method="POST">
		<label>Name of Product:</label>
		<input type="text" name="Product_name" required><br>
		<label>Select a Category</label>
		<select name="Category">
			<?php 
				// use a while loop to fetch data 
				// from the $all_categories variable 
				// and individually display as an option
				while ($category = mysqli_fetch_array(
						$all_categories,MYSQLI_ASSOC)):; 
			?>
				<option value="<?php echo ["Catid"];
					// The value we usually set is the primary key
				?>">
					<?php echo $category["cat_title"];
						// To show the category name to the user
					?>
				</option>
			<?php 
				endwhile; 
				// While loop must be terminated
			?>
		</select>
		<br>
		<input type="submit" value="submit" name="submit">
	</form>
	<br>
</body>
</html>

<?php
// Get all the Type from product Type table
//$sql = "SELECT * FROM `product_type`" ;
//$all_type = mysqli_query($con, $sql);

// The following code checks if the submit button is clicked 
// and inserts the data in the database accordingly
//if(isset($_POST['submit']))
//{
// Store the Product name in a "name" variable
//$name = mysqli_real_escape_string($con,$_POST['Pname']);

// Store the producttype ID in a "id" variable
//$id = mysqli_real_escape_string($con,$_POST['product_type']); 

// Creating an insert query using SQL syntax and
// storing it in a variable.
//$sql_insert = 
//"INSERT INTO `product`(`pname`, `pt_id`)
  //  VALUES ('$name','$id')";

// The following code attempts to execute the SQL query
// if the query executes with no errors 
// a javascript alert message is displayed
// which says the data is inserted successfully
//if(mysqli_query($con,$sql_insert))
//{
  //  echo '<script>alert("Product added successfully")</script>';
//}
//}
//?//>

       //<label>Select a Type</label>
		//<select name="Type">
			//</?php 
				// use a while loop to fetch data 
				// from the $all_categories variable 
				// and individually display as an option
				//while ($product_type = mysqli_fetch_array(
						//$$all_type,MYSQLI_ASSOC)):; 
			//?/>
				//<option value="</?php echo $product_type["pt_id"];
					// The value we usually set is the primary key
				//?/>/">
					//</?php //echo $product_type["pt_name"];
						//// To show the category name to the user
					//?/>
				//</option>
			//</?php 
				//endwhile; 
				// While loop must be terminated
			//?/>
		//</select>
		//<br> 