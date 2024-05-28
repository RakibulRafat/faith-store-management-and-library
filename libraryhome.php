<?php include('header.php');

// Pagination variables
$limit = 10; // Number of records per page
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$start_from = ($current_page - 1) * $limit;


// Fetch books data from the database
$sql = "SELECT book_id, book_tittle, cover, file FROM books LIMIT $start_from, $limit";
$result = $conn->query($sql);

$books = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $books[] = $row;
    }
}

?>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f0f0;
  }
  .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    grid-gap: 20px;
  }
  .book {
    background-color: #fff;
    border-radius: 5px;
    padding: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
  }
  .book img {
    max-width: 100%;
    height: auto;
  }
  .book:hover {
    transform: translateY(-5px);
    color: red;
  }
</style>

<form action="booksrch.php" method="get" id="searchForm">
    <input type="text" name="book_id" placeholder="Search By Book ID...">
    <input type="text" name="book_tittle" placeholder="Search By Book Name...">
    <input type="text" name="author" placeholder="Search By Author Name...">
    <input type="text" name="publisher" placeholder="Search By Publisher Name...">
    <button type="submit">Search</button>
</form>



    <section id="books">
        <div class="container">
            <?php foreach ($books as $book): ?>
                <div class="book">
                    <img src="<?php echo $book['cover']; ?>" alt="<?php echo $book['book_tittle']; ?>">
                    <p><?php echo $book['book_tittle']; ?></p>
                    <a href="<?php echo $book['cover'];?>" class="btn btn-primary" title="View">View</a>
                    <a href="<?php echo $book['file'];?>" class="btn btn-success">Read</a>  <!-- Reading pdf file from db -->


                    <!-- <a href="/pdf/না বলতে শিখুন.pdf" class="btn btn-success" title="Read">Read</a> -->
                </div>
            <?php endforeach; ?>
        </div>
    </section>

  <?php
    // Pagination links
   $sql1 = "SELECT COUNT(book_id) AS total FROM books";
   $result1 = mysqli_query($conn, $sql1);
   $row1 = mysqli_fetch_assoc($result1);
   $total_records = $row1['total'];
   $total_pages = ceil($total_records / $limit);


   echo "<ul class='pagination'>";
   for ($i = 1; $i <= $total_pages; $i++) {
       $active_class = ($i == $current_page) ? 'active' : '';
       echo "<li class='$active_class'><a href='libraryhome.php?page={$i}'>{$i}</a></li>";
   }
   echo "</ul>";

   $conn->close();
   
 include('footer.php');?>



<!-- <title>E-Library Book Gallery</title>


<div class="container">
  <div class="book">
    <img src="library/participatory learning & action.jpg" alt="Book 1" onclick=" location.href = 'mybookcover.php'">
    <h6>Tittle: Participatory Learning & Action
        Author:JULES N PRETTY.
    </h6>
    <button title = 'view' value=". $row['book_id'] .">View</button>
    <a href="6021IIED VVI.pdf" target="_demo" class="btn btn-success" >Read</a>  <!-- https://www.youtube.com/watch?v=o6-eO9k4SuY (src vid link)
  </div>
  <div class="book">
    <img src="img/autism spectrum.png" alt="Book 2" onclick=" location.href = 'mybookcover.php'">
    <h6>Tittle: অটিজম স্পেকট্রাম ডিজঅর্ডার <br>
        Author: Global Autism, Bangladesh.
    </h6>
    <a href="mybookcover.php" class="btn btn-primary">View</a>
    <a href="অটিজম স্পেকট্রাম ডিজঅর্ডার সম্পর্কিত বই.pdf" target="demo1" class="btn btn-success">Read</a>
  </div>
  <div class="book">
    <img src="img/na bolte shikhun.png" alt="Book 3" onclick=" location.href = 'mybookcover.php'">
    <h6>Tittle: না বলতে শিখুন
        Author:Renu Soron.
    </h6>
    <a href="mybookcover.php" class="btn btn-primary">View</a>
    <a href="img/না বলতে শিখুন.pdf" target="demo2" class="btn btn-success">Read</a>
  </div>
  <div class="book">
    <img src="library/amar boi.jpg" alt="Book 4" onclick=" location.href = 'mybookcover.php'">
    <h6>Tittle: Amar Boi 
        Author:james.
    </h6>
    <a href="mybookcover.php" class="btn btn-primary">View</a>
    <a href="Amar Boi -com opt.pdf" target="demo3" class="btn btn-success">Read</a>
  </div>
  <!-- <div class="book">
    <img src="library/bc4.jpg" alt="Book 5" onclick=" location.href = 'mybookcover.php'">
    <h6>Tittle: Bigger & Better
        Author:andersin Lee.
    </h6>
    <a href="mybookcover.php" class="btn btn-primary">View</a>
    <a href="readbook.php" class="btn btn-success">Read</a>
  </div>
 
</div>
<div class="container">
  <div class="book">
    <img src="library/bc5.png" alt="Book 6" onclick=" location.href = 'mybookcover.php'">
    <h6>Tittle: New Educators
        Author:andrew.
    </h6>
    <a href="mybookcover.php" class="btn btn-primary">View</a>
    <a href="readbook.php" class="btn btn-success">Read</a>
  </div>
  <div class="book">
    <img src="library/bc6.jpg" alt="Book 7" onclick=" location.href = 'mybookcover.php'">
    <h6>Tittle: Don't Look Back
        Author:andersin.
    </h6>
    <a href="mybookcover.php" class="btn btn-primary">View</a>
    <a href="readbook.php" class="btn btn-success">Read</a>
  </div>
  <div class="book">
    <img src="library/bc7.jpg" alt="Book 8" onclick=" location.href = 'mybookcover.php'">
    <h6>Tittle: Corporate Design
        Author: Nelson.
    </h6>
    <a href="mybookcover.php" class="btn btn-primary">View</a>
    <a href="readbook.php" class="btn btn-success">Read</a>
  </div>
  <div class="book">
    <img src="library/bc8.jpg" alt="Book 9" onclick=" location.href = 'mybookcover.php'">
    <h6>Tittle: Black & White
        Author:andersin.
    </h6>
    <a href="mybookcover.php" class="btn btn-primary">View</a>
    <a href="readbook.php" class="btn btn-success">Read</a>
  </div>
  <div class="book">
    <img src="library/bc9.jpg" alt="Book 10" onclick=" location.href = 'mybookcover.php'">
    <h6>Tittle: Soul
        Author:Wilson.
    </h6>
    <a href="mybookcover.php" class="btn btn-primary">View</a>
    <a href="readbook.php" class="btn btn-success">Read</a>
  </div>
 
</div>
<div class="container">
  <div class="book">
    <img src="library/1971.jpg" alt="Book 11" onclick=" location.href = 'mybookcover.php'">
    <h6>Tittle: 1971
        Author: anam zakaria.
    </h6>
    <a href="mybookcover.php" class="btn btn-primary">View</a>
    <a href="readbook.php" class="btn btn-success">Read</a>
  </div>
  <div class="book">
    <img src="library/DLD.jpg" alt="Book 12" onclick=" location.href = 'mybookcover.php'">
    <h6>Tittle: Digital Logic Design
        Author:andersin.
    </h6>
    <a href="mybookcover.php" class="btn btn-primary">View</a>
    <a href="readbook.php" class="btn btn-success">Read</a>
  </div>
  <div class="book">
    <img src="library/writing.jpg" alt="Book 13" onclick=" location.href = 'mybookcover.php'">
    <h6>Tittle: English Writing
        Author: abraham.
    </h6>
    <a href="mybookcover.php" class="btn btn-primary">View</a>
    <a href="readbook.php" class="btn btn-success">Read</a>
  </div>
  <div class="book">
    <img src="library/speaking.jpg" alt="Book 14" onclick=" location.href = 'mybookcover.php'">
    <h6>Tittle: English Spoken
        Author: andrew.
    </h6>
    <a href="mybookcover.php" class="btn btn-primary">View</a>
    <a href="readbook.php" class="btn btn-success">Read</a>
  </div>
  <div class="book">
    <img src="library/bc11.jpg" alt="Book 15" onclick=" location.href = 'mybookcover.php'">
    <h6>Tittle: My Book Cover
        Author:andersin.
    </h6>
    <a href="mybookcover.php" class="btn btn-primary">View</a>
    <a href="readbook.php" class="btn btn-success">Read</a>
  </div> -->
  <!-- Add more book divs as needed -->
</div> -->