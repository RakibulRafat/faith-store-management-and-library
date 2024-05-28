<?php include('header.php');?>
<div>
    <h2 class="text-center">BOOK Entry</h2>
      <form onsubmit="return validateForm()" action="insertbk.php" enctype="multipart/form-data" method="POST" class="custom-form" >
      <label for="text">Book Name</label>
      <input type="text" name="bkname">

      <label for="text">Author Name</label>
      <input type="text" name="authore">

      <label for="text">Publisher Name</label>
      <input type="text" name="publisher">

      <label for="date">Publish Date</label>
      <input type="date" name="pubdate">

     <p>Book Format</p>
     <input type="radio" id="hardcopy" name="format" value="hardcopy">
     <label for="hardcopy">Hard Copy</label>
     <input type="radio" id="softcopy" name="format" value="softcopy">
     <label for="softcopy">Soft Copy</label><br>
 

      <label for="number">Total Copies</label>
      <input type="number" name="copies">

      <label for="file">Book Cover</label>
      <input type="file" name="image"><br><br>

      <label for="file">Book pdf</label>
      <input type="file" name="pdf"><br><br>

      <label for="radio">Book Source</label>
      <input type="radio" id="Purchased" name="source" value="purchased">
      <label for="purchased">Purchased</label>
      <input type="radio" id="Gift" name="source" value="Gift">
      <label for="Gift">Gift</label>
      <input type="radio" id="Homemade" name="source" value="Homemade">
      <label for="Homemade">Homemade</label>
      <input type="radio" id="Others" name="source" value="Others">
      <label for="Others">Others</label><br>

      <label for="date">Book Entry Date</label>
      <input type="date" name="entrydate">

      <label for="text">Description</label>
      <input type="text" name="description">

      <input type="hidden" value="1" name="Submit">
      <button type="submit" name="submit" class="btn btn-secondary">Submit Book</button>

</div>




<?php include('footer.php');?>
