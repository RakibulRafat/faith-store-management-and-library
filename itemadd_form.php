<?php include('header.php');?>
 

    <div>
    <h2 class="text-center">Product Entry</h2>
    <form onsubmit="return validateForm()" action="insertprod.php" enctype="multipart/form-data" method="POST" class="custom-form" >


        <label for="input">Product Name</label>
        <input id="iname" name="title" type="text" value="" placeholder="Item Title"><br><br>

        <?php

        	// Get all the categories from category table
	$sql = "SELECT * FROM `catagory`" ;
	$all_categories = mysqli_query($conn, $sql);

	// The following code checks if the submit button is clicked 
	// and inserts the data in the database accordingly
	if(isset($_POST['submit']))
	{
		// Store the Product name in a "name" variable
		$name = mysqli_real_escape_string($conn,$_POST['Pname']);
		
		// Store the Category ID in a "id" variable
		$id = mysqli_real_escape_string($conn,$_POST['Category']); 
		
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


<!-- <label>Select a Category</label>

		<select name="Category">
                  <option Value="">-Select Category-</option>
			<?php 
				// use a while loop to fetch data 
				// from the $all_categories variable 
				// and individually display as an option
				//while ($category = mysqli_fetch_array(
						//$all_categories,MYSQLI_ASSOC)):; 
			
				//echo '<option value="'.$category["catid"].'" >'.$category["cat_title"].'</option>';
			
				//endwhile; 
				// While loop must be terminated
			?>
		</select><br>
		<br> -->


            

<label for="select">Items</label>
        <select id="Item" name="Item" class="btn btn-primary dropdown-toggle" >
        <option Value="" >-Select Category-</option>
              <option VALUE="1">IT Products</option>
              <option Value="2">Therapy Equipment</option>
              <option Value="3">Electronics</option>
              <option Value="4">Tool Kit</option>
              <option Value="5">Repaired Item</option>
              <option Value="6">Medical Item</option>
              <option Value="7">Asthema Item</option>
              <option Value="8">Kitchen Item</option>
              <option Value="9">Householder & Grecery</option>
              <option Value="10">Printing & Press</option>
              <option Value="11">Stationary</option>
              <option Value="12">Office Equipment</option>
              <option Value="13">Cooking Item</option>
        </select><br>
        <br> 




    <label for="textarea">Product Description</label>
    <textarea name="Description" id="Description" value="" cols="20" rows="10" placeholder="Description Of Product" ></textarea><br><br>

        <label for="select">Color</label>
      <select id="Color" name="Color" class="btn btn-primary dropdown-toggle">
            <option Value="" >-Select Color-</option>
            <option>BLACK</option>
            <option>WHITE</option>
            <option>BLUE</option>
            <option>YELLOW</option>
            <option>ORANGE</option>
            <option>PURPLE</option>
            <option>PINK</option>
            <option>GREEN</option>
            <option>SKY BLUE</option>
            <option>RED</option>
            <option>MEROON</option>
            <option>Gray</option>
      </select><br><br>
          
            <label for="select">Type</label>
            <select name ="Type" id="Type" class="btn btn-primary dropdown-toggle">
            <option Value="">-Select Type-</option>
            <option value="1">DSLR</option>
            <option value="2">SONY</option>
            <option value="3">WIRELESS</option>
            <option value="4">WIRED</option>
            <option value="5">1 TON</option>
            <option value="6">1.5 TON</option>
            <option value="7">2 TON</option>
            <option value="8">2.5 TON</option>
            <option value="9">CORDLESS</option>
            <option value="10">WITH CORD</option>
            <option value="11">WITH SOUND</option>
            <option value="12">WITHOUT SOUND</option>
            <option value="13">A3</option>
            <option value="14">A4</option>
            <option value="15">LEGAL</option>
            <option value="16">ART</option>
            <option value="17">POSTER</option>
            <option value="18">CHART</option>
            <option value="19">PHOTO</option>
            <option value="20">CERTIFIACTE</option>
            <option value="21">MEETING TABLE</option>
            <option value="22">READING TABLE</option>
            <option value="23">DINE IN TABLE</option>
            <option value="24">SERVING TABLE</option>
            <option value="25">REVOLVING</option>
            <option value="26">PLASTIC</option>
            <option value="27">WOODEN</option>
            <option value="28">TRAINING TABLE</option>
           </select><br> 

      <br>
  
                  <label for="radio">Item Source</label><br>
                  <input type="radio" id="Purchased" name="ItemSource" value="purchased">
                  <label for="purchased">Purchased</label>
                  <input type="radio" id="Gift" name="ItemSource" value="Gift">
                  <label for="Gift">Gift</label>
                  <input type="radio" id="Homemade" name="ItemSource" value="Homemade">
                  <label for="Homemade">Homemade</label>
                  <input type="radio" id="Others" name="ItemSource" value="Others">
                  <label for="Others">Others</label><br>


                             
             <label for="checkbox">Active status</label><br>
             <input type="checkbox" id="ActiveStatus" name="ActiveStatus" value="Yes">
             <label for="ActiveStatus">Yes</label><br>
             <input type="checkbox" id="ActiveStatus" name="ActiveStatus" value="No">
             <label for="ActiveStatus">No</label><br><br>


       

            <label for="number">Quantity</label>
            <input type="number" name="Quantity" id="Quantity" value="Quantity"><br><br>

            
            <label for="number">Price</label>
             <input id="price" name="price" value="price" type="number"><br><br>

             <label for="datetime-local">Purchase Date</label>
        <input type="datetime-local" name="EntryDate" id="Date" value="Date"><br><br>

        <label for="">Purchase Person</label>
        <select id="person" name="person" class="btn btn-primary dropdown-toggle">
              <option Value="">Select Buyer</option>
              <option>Asif Arman</option>
              <option>Mishel</option>
              <option>Mosharof</option>
              <option>Ajay</option>
              <option>Rafiqul ISlam</option> 
</select>
              <br><br>

              <label for ="image">Upload Product Image</label>
       <input type="file" name="image" id="image" accept="image" value =""><br>
        <br>

        <!-- <label for ="image1">Upload Product Image</label>
       <input type="file" name="image1" id="image1" accept="image1" value =""><br>
        <br>

        <label for ="image2">Upload Product Image</label>
       <input type="file" name="image2" id="image2" accept="image2" value =""><br>
        <br>

        <label for ="image3">Upload Product Image</label>
       <input type="file" name="image3" id="image3" accept="image3" value =""><br>
        <br> -->
             
             <label for="datetime-local">Expired Date</label>
             <input type="datetime-local" name="ExpDate" id="Date" value="Date"><br><br>


            <!--<label for="select">Store1</label><br>
        <select id="store1" name="store1">
              <option>Shelf1--row1</option>
              <option>Shelf1--row2</option>
              <option>Shelf1--row3</option>
              <option>Shelf1--row4</option>
              <option>Shelf1--row5</option>
              <option>Shelf2--row1</option>
              <option>Shelf2--row2</option>
              <option>Shelf2--row3</option>
              <option>Shelf2--row4</option>
              <option>Shelf2--row5</option>
              <option>Shelf3--row1</option>
              <option>Shelf3--row2</option>
              <option>Shelf3--row3</option>
              <option>Shelf3--row4</option>
              <option>Shelf3--row5</option>
              <option>Shelf4--row1</option>
              <option>Shelf4--row2</option>
              <option>Shelf4--row3</option>
              <option>Shelf4--row4</option>
              <option>Shelf4--row5</option>
              <option>Shelf5--row1</option>
              <option>Shelf5--row2</option>
              <option>Shelf5--row3</option>
              <option>Shelf5--row4</option>
              <option>Shelf5--row5</option>
              


        </select><br><br>

        <label for="select">Store2</label><br>
        <select id="store2" name="store2">

              <option>Shelf1--row1</option>
              <option>Shelf1--row2</option>
              <option>Shelf1--row3</option>
              <option>Shelf1--row4</option>
              <option>Shelf1--row5</option>
              <option>Shelf2--row1</option>
              <option>Shelf2--row2</option>
              <option>Shelf2--row3</option>
              <option>Shelf2--row4</option>
              <option>Shelf2--row5</option>
        </select><br><br>   


          
               <label for="radio">Store</label><br>
               <input type="radio" id="Store1" name="Store" value="Store1">
               <label for="Store1">Store 1</label><br>
               <input type="radio" id="Store2" name="Store" value="Store2">
               <label for="Store2">Store 2</label><br>


       
     


             <label for="">Purchase Person</label>
             <input id="person" name="person" VALUE="" type="text"><br>

             <label for="">Created By:</label>
             <input id="create" name="create" VALUE="" type="text"><br>

             <label for="">Created Date</label>
             <input id="cdate" name="cdate" VALUE="" type="date"><br> --> 

<input type="hidden" value="1" name="Submit">
<button type="submit" name="submit">Submit Item</button>

 
    </form>
    </div>
      
<?php include('footer.php');?>