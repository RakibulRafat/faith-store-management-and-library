<?php
include('header.php');
?>


<div>
        <h1 class="text-center">Products Are Bellow!!!</h1>
    </div> 
    <button id="loadProducts" class="btn btn-danger">Load Products</button>
    <div id="productList">
        <h1 class="text-center">To see the products History Please Click The Button!!!</h1>
    </div> 

    <script>
        $(document).ready(function () {
            $("#loadProducts").click(function () {
                $.ajax({
                    url: "showprdct.php",
                    type: "GET",
                    success: function (data) {
                        $("#productList").html(data);
                    },
                    error: function () {
                        console.log("Error fetching product list");
                    }
                });
            });
        });
    </script>
   
	 
   <h1 class="centered-heading">
			Category Slider
		</h1>

		<h1 class="text-center text-success">
			C A T E G O R I E S
		</h1>


		<br><br>
	

	<!-- Image container of the image slider 
	<div class="image-container">
    <div class="image-container">-->
        
  <?php
    // Fetch data from the database
    $sql = "SELECT cat_title FROM catagory";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Output data of each row
      while ($row = $result->fetch_assoc()) {
        echo '<div class="carousel-inner">';
        echo '<div class="text-center">' . $row["cat_title"] . '</div>';
        //echo '<img src="' . $row["image_url"] . '">';
        echo '</div>';
      }
    } else {
      echo "0 results";
    }

    // Close the database connection
    $conn->close();
  ?>
  <div class="centered-heading"><img src=
"https://previews.123rf.com/images/sph1410/sph14101504/sph1410150400170/38850885-category-colorful-word-on-the-wooden-background.jpg"></div>
<!-- </div>
		 <div class="slide">
			<div class="slideNumber">1</div>
			<img src=
"https://img.freepik.com/free-photo/painting-mountain-lake-with-mountain-background_188544-9126.jpg">
		</div>
		<div class="slide">
			<div class="slideNumber">2</div>
			<img src=
"https://www.shutterstock.com/image-illustration/pristine-reflective-lake-show-image-260nw-2305485315.jpg">
		</div>
		<div class="slide">
			<div class="slideNumber">3</div>
			<img src=
"https://www.geeksforgeeks.org/wp-content/uploads/jquery-banner.png">
		</div> -->
		<!-- <!- Next and Previous icon to change images 
		<a class="previous" onclick="moveSlides(-1)">
			<i class="fa fa-chevron-circle-left"></i>
		</a>
		<a class="next" onclick="moveSlides(1)">
			<i class="fa fa-chevron-circle-right"></i>
		</a>
	</div>  -->
	<br>

	 <div style="text-align:center">
		<span class="footerdot" onclick="activeSlide(1)">
		</span>
		<span class="footerdot" onclick="activeSlide(2)">
		</span>
		<span class="footerdot" onclick="activeSlide(3)">
		</span>
        <span class="footerdot" onclick="activeSlide(4)">
		</span>
        <span class="footerdot" onclick="activeSlide(5)">
		</span>
        <span class="footerdot" onclick="activeSlide(6)">
		</span>
        <span class="footerdot" onclick="activeSlide(7)">
		</span>
        <span class="footerdot" onclick="activeSlide(8)">
		</span>
        <span class="footerdot" onclick="activeSlide(9)">
		</span>
        <span class="footerdot" onclick="activeSlide(10)">
		</span>
        <span class="footerdot" onclick="activeSlide(11)">
		</span>
        <span class="footerdot" onclick="activeSlide(12)">
		</span>
        <span class="footerdot" onclick="activeSlide(13 )">
		</span>
	</div>  

	<script>
		let slideIndex = 1;
		displaySlide(slideIndex);

		function moveSlides(n) {
			displaySlide(slideIndex += n);
		}

		function activeSlide(n) {
			displaySlide(slideIndex = n);
		}

		/* Main function */
		function displaySlide(n) {
			let i;
			let totalslides =
				document.getElementsByClassName("slide");

			let totaldots =
				document.getElementsByClassName("footerdot");

			if (n > totalslides.length) {
				slideIndex = 1;
			}
			if (n < 1) {
				slideIndex = totalslides.length;
			}
			for (i = 0; i < totalslides.length; i++) {
				totalslides[i].style.display = "none";
			}
			for (i = 0; i < totaldots.length; i++) {
				totaldots[i].className =
					totaldots[i].className.replace(" active", "");
			}
			totalslides[slideIndex - 1].style.display = "block";
			totaldots[slideIndex - 1].className += " active";
		}
		// Auto-move the slider every 3 seconds (adjust the interval as needed)
  setInterval(function () {
    moveSlides(1);
  }, 3000);
	</script>



<?php
include('footer.php');
?>