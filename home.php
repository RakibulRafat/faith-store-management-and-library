<?php include ('header.php');  ?>
    



<h1 class="centered-heading text-info">Welcome To Faith Store.</h1>
    <img src="Faith.png" alt="Faith" class="homeimg"> 
		 <!-- <div class="slide">
			<img class="homeimg" src="https://www.faithbangladesh.org/med-template/img/slider-img-01.jpg" >
		</div>
      <div class="slide">
			<img class="homeimg" src=
"https://t3.ftcdn.net/jpg/02/74/77/68/360_F_274776871_8DH1CBKK3MAAD3kS21aClKyhl3xQKgYJ.jpg">
		</div>
		<div class="slide">
			<img class="homeimg" src=
"https://www.faithbangladesh.org/med-template/img/faith_logo_large.png">
		</div>
		<div class="slide">
			<img class="homeimg" src=
"https://e7.pngegg.com/pngimages/232/939/png-clipart-inventory-management-software-warehouse-management-system-management-warehouse-miscellaneous-angle.png">
		</div> 
    
		 Next and Previous icon to change images 
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

   <?php include('footer.php'); ?>
