<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Responsive Slider</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    @media (max-width: 767px) {
		.carousel-inner .carousel-item > div {
			display: none;
		}
		.carousel-inner .carousel-item > div:first-child {
			display: block;
		}
	}

	.carousel-inner .carousel-item.active,
	.carousel-inner .carousel-item-next,
	.carousel-inner .carousel-item-prev {
		display: flex;
	}

	/* medium and up screens */
	@media (min-width: 768px) {

		.carousel-inner .carousel-item-end.active,
		.carousel-inner .carousel-item-next {
			transform: translateX(25%);
		}

		.carousel-inner .carousel-item-start.active, 
		.carousel-inner .carousel-item-prev {
			transform: translateX(-25%);
		}
	}

	.carousel-inner .carousel-item-end,
	.carousel-inner .carousel-item-start { 
		transform: translateX(0);
	}
	.col-md-3 img {
        transition: transform 0.3s ease-in-out;
    }

    .col-md-3:hover img {
        transform: scale(1.2);
    }
	
  </style>
</head>
<body>
<div class="container text-center my-3">
		<div class="row mx-auto my-auto justify-content-center">
			<div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
				<div class="carousel-inner" role="listbox">
					<div class="carousel-item active">
						<div class="col-md-3">
							<div class="card">
								<div class="card-img">
									<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTIcxm1tSJphluNimxurlape3Q9nhLcX3_apA&usqp=CAU" class="img-fluid">
								</div>
								<div class="card-img-overlay">Slide 1</div>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="col-md-3">
							<div class="card">
								<div class="card-img">
									<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTlxCvC68F3M6hoI9pUUaw_ZBsAhajSx1GZ2wPjMvd-5FIMf3mmQ9Brrt5I1wFbVPuWDc0&usqp=CAU" class="img-fluid">
								</div>
								<div class="card-img-overlay">Slide 2</div>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="col-md-3">
							<div class="card">
								<div class="card-img">
									<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTU4TAlXjS7-siTNCeSRu7zwbL14Ld4YL72e2GNblCHd1i-_eGklua0Ay6DJCYIBZeBVEk&usqp=CAU" class="img-fluid">
								</div>
								<div class="card-img-overlay">Slide 3</div>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="col-md-3">
							<div class="card">
								<div class="card-img">
									<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQqKIS4-riJ4ZgDKMK0Oh2qapWQJ2rwDfKEtA&usqp=CAU" class="img-fluid">
								</div>
								<div class="card-img-overlay">Slide 4</div>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="col-md-3">
							<div class="card">
								<div class="card-img">
									<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSFBr35nsGltX_wIDUpo4TCQCXGHsnU1P9qUQ&usqp=CAU" class="img-fluid">
								</div>
								<div class="card-img-overlay">Slide 5</div>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="col-md-3">
							<div class="card">
								<div class="card-img">
									<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTuOG0iGP_VQYkx6T9-Q0yF_LP-AzIxSEl2oA&usqp=CAU" class="img-fluid">
								</div>
								<div class="card-img-overlay">Slide 6</div>
							</div>
						</div>
					</div>
				</div>
        
				<a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      </a>
       <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
      </a>

			</div>
		</div>		
	</div>





<script>
    let items = document.querySelectorAll('.carousel .carousel-item');

items.forEach((el) => {
    const minPerSlide = 4;
    let next = el.nextElementSibling;
    for (var i=1; i<minPerSlide; i++) {
        if (!next) {
    // wrap carousel by using first child
    next = items[0];
}
let cloneChild = next.cloneNode(true);
el.appendChild(cloneChild.children[0]);
next = next.nextElementSibling;
}
});
</script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
</body>
</html>
