<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Responsive Slider</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleSlidesOnly" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleSlidesOnly" data-slide-to="1"></li>
    <li data-target="#carouselExampleSlidesOnly" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="row">
        <div class="col-sm">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQJjdvc7L6lgjpWgSCyYCBYvhAJbi8M21USGQ&usqp=CAU" class="d-block w-20" alt="Slide 1">
        </div>
        <div class="col-sm">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSzJDx2rgz5O2J26_fzWpRxRIHyKbg_uOfsUQ&usqp=CAU" class="d-block w-20" alt="Slide 2">
        </div>
        <div class="col-sm">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSA4f6wnsNip4N-P-57m1bUYxRx7zsz7Q1uFA&usqp=CAU" class="d-block w-20" alt="Slide 3">
        </div>
        <div class="col-sm">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSA4f6wnsNip4N-P-57m1bUYxRx7zsz7Q1uFA&usqp=CAU" class="d-block w-20" alt="Slide 3">
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="row">
        <div class="col-sm">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRKeRPJ6Cu_cdiLiDb_ffrn6r0oi09bJXoGyA&usqp=CAU" class="d-block w-20" alt="Slide 4">
        </div>
        <div class="col-sm">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRPZB192knqQZa0MsExgrV8lw51cdHL52Ny5A&usqp=CAU" class="d-block w-20" alt="Slide 5">
        </div>
        <div class="col-sm">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQSnfBD8oiQixFsc59ccAI4fSbIBvvTjUEZuw&usqp=CAU" class="d-block w-20" alt="Slide 6">
        </div>
      </div>
    </div>
    <!-- Add more carousel items with rows and columns as needed -->
  </div>
  <a class="carousel-control-prev" href="#carouselExampleSlidesOnly" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleSlidesOnly" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    <!-- <script>
        let items = document.querySelectorAll('.carousel .carousel-item')

    items.forEach((el) => {
        const minPerSlide = 4
        let next = el.nextElementSibling
        for (var i=1; i<minPerSlide; i++) {
            if (!next) {
        // wrap carousel by using first child
        next = items[0]
    }
    let cloneChild = next.cloneNode(true)
    el.appendChild(cloneChild.children[0])
    next = next.nextElementSibling
    }
    })
    </script> -->
</body>
</html>
s