
<?php
include('header.php');

$sql = "SELECT * FROM product WHERE pid = ".$id." ";
$result = mysqli_query($conn, $sql);





if (mysqli_num_rows($result) > 0) {
    // Create an HTML table


    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $pid = $row["pid"];
        $pname = $row["pname"];
        $catid = $row["catid"];
        //echo "<td>" . $row["catid"] . "</td>";
        //echo "<td>" . $row["pdescription"] . "</td>";
        //echo "<td>" . $row["color"] . "</td>";
        ///echo "<td>" . $row["item_source"] . "</td>";
        //echo "<td>" . $row["price"] . "</td>";
        //echo "<td>" . $row["quantity"] . "</td>";
        //echo "<td>" . $row["purchase_date"] . "</td>";
        //echo "<td>" . $row["expired_date"] . "</td>";
        //echo "</tr>";
    }

   
} else {
    echo "0 results";
}
mysqli_close($conn);

?>

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



           

    <div>
    <h2 class="text-center">Update Products</h2>
    <form onsubmit="return validateForm()" action="updateresult.php" method="POST" class="custom-form">

        <input id="iname" name="title" type="text" value="<?php echo $pname;?>" placeholder="Item Title"><br><br>

        <label for="select">Items</label>
        <select id="Item" name="Item">
              <option value="1"<?php echo($catid==1)?'selected':'';?>>IT Products</option>
              <option value="2"<?php echo($catid==2)?'selected' :'';?>>Therapy Equipment</option>
              <option value="3"<?php echo($catid==3)?'selected' :'';?>>Electronics</option>
              <option value="4"<?php echo($catid==4)?'selected' :'';?>>Tool Kit</option>
              <option value="5"<?php echo($catid==5)?'selected' :'';?>>Repaired Item</option>
              <option value="6"<?php echo($catid==6)?'selected' :'';?>>Medical Item</option>
              <option value="7"<?php echo($catid==7)?'selected' :'';?>>Asthema Item</option>
              <option value="8"<?php echo($catid==8)?'selected' :'';?>>Kitchen Item</option>
              <option value="9"<?php echo($catid==9)?'selected' :'';?>>Householder & Grecery</option>
              <option value="10"<?php echo($catid==10)?'selected' :'';?>>Printing & Press</option>
              <option value="11"<?php echo($catid==11)?'selected' :'';?>>Stationary</option>
              <option value="12"<?php echo($catid==12)?'selected' :'';?>>Office Equipment</option>
        </select><br><br>
       
     
        <textarea name="Description" id="Description" value="<?php echo $pdescription;?>" cols="20" rows="10" ></textarea><br><br>

        <label for="select">Color</label>
      <select id="Color" name="Color">
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
      </select><br><br>
       
        <label for="select">Type</label>
        <select id="Type" name="Type">
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
                  <label for="purchased">Purchased</label><br>
                  <input type="radio" id="Gift" name="ItemSource" value="Gift">
                  <label for="Gift">Gift</label><br>
                  <input type="radio" id="Homemade" name="ItemSource" value="Homemade">
                  <label for="Homemade">Homemade</label><br>
                  <input type="radio" id="Others" name="ItemSource" value="Others">
                  <label for="Others">Others</label><br> <br>


                             
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
        <select id="person" name="person">
              <option>Asif Arman</option>
              <option>Mishel</option>
              <option>Mosharof</option>
              <option>Ajay</option>
              <option>Rafiqul ISlam</option> 
</select>
              <br><br>

             
             <label for="datetime-local">Expired Date</label>
             <input type="datetime-local" name="ExpDate" id="Date" value="Date"><br><br>

<button type="submit">Submit Item</button>
</form>
 
 
  <?php include('footer.php'); ?>    