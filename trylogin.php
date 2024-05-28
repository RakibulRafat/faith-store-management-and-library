<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Owl Carousel Example</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<style>
  /* Additional custom styles can be added here */
  .owl-carousel .item img {
    transition: transform 0.3s ease-in-out;
  }

  .owl-carousel .item img:hover {
    transform: scale(1.2);
  }
</style>
</head>
<body>

<div class="owl-carousel owl-theme">
  <div class="item"><img src="Faith.png" alt="Faith" class="homeimg"> </div>
    <div class="item"><img src="SMS/Drone.jpeg" alt="drone" class="homeimg"> </div>
     <div class="item"><img src="Dell Laptop.jpeg" alt="lptp" class="homeimg"> </div>
      <div class="item"><img src="faith_logo_large.png" alt="Faith logo" class="homeimg"> </div>
      <div class="item"><img src="Faith.png" alt="Faith" class="homeimg"> </div>
      <div class="item"><img src="faith_logo_large.png" alt="Faith logo" class="homeimg"> </div>
    <div class="item"><img src="Faith.png" alt="Faith" class="homeimg"> </div>
   <div class="item"><img src="faith_logo_large.png" alt="Faith logo" class="homeimg"> </div>
  <div class="item"><img src="Faith.png" alt="Faith" class="homeimg"> </div>
  <div class="item"><img src="faith_logo_large.png" alt="Faith logo" class="homeimg"> </div>
  <div class="item"><img src="Faith.png" alt="Faith" class="homeimg"> </div>
   <div class="item"><img src="faith_logo_large.png" alt="Faith logo" class="homeimg"> </div>
</div>
<div class="owl-carousel owl-theme">
  <div class="item"><img src="Faith.png" alt="Faith" class="homeimg"> </div>
   <div class="item"><img src="faith_logo_large.png" alt="Faith logo" class="homeimg"> </div>
    <div class="item"><img src="Dell Laptop.jpeg" alt="lptp" class="homeimg"> </div>
     <div class="item"><img src="faith_logo_large.png" alt="Faith logo" class="homeimg"> </div>
      <div class="item"><img src="Faith.png" alt="Faith" class="homeimg"> </div>
       <div class="item"><img src="faith_logo_large.png" alt="Faith logo" class="homeimg"> </div>
      <div class="item"><img src="Faith.png" alt="Faith" class="homeimg"> </div>
     <div class="item"><img src="faith_logo_large.png" alt="Faith logo" class="homeimg"> </div>
    <div class="item"><img src="Faith.png" alt="Faith" class="homeimg"> </div>
   <div class="item"><img src="faith_logo_large.png" alt="Faith logo" class="homeimg"> </div>
  <div class="item"><img src="Faith.png" alt="Faith" class="homeimg"> </div>
<div class="item"><img src="faith_logo_large.png" alt="Faith logo" class="homeimg"> </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
  $(document).ready(function(){
    $('.owl-carousel').owlCarousel({
      loop:true,
      margin:10,
      nav:true, 
      responsive:{
        0:{
          items:1
        },
        600:{
          items:3
        },
        1000:{
          items:5
        }
      }
    });
  });
</script>

</body>
</html>
