<?php
  session_start();
  $count = 0;
  // connecto database
  
  $title = "Index";
  require_once "./template/header.php";
  require_once "./functions/database_functions.php";
  $conn = db_connect();
  $row = select4LatestBook($conn);
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


<!-----------------slide------------------->

<div class="bd-example">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div style="background-image: linear-gradient(to right top, #eb2929, #f4035d, #ec1f8e, #d345ba, #a763dd, #817ef2, #5293fd, #00a5ff, #00bcff, #00d1ff, #00e3f6, #17f4e6);" class="carousel-item active"> <img src="images/bn1.jpg" class="d-block w-100" height="350" width="50" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5></h5>
          <p></p>
        </div>
      </div>
      <div class="carousel-item"> <img src="images/2.jpg" class="d-block w-100" height="350" width="50" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5></h5>
          <p></p>
        </div>
      </div>
      <div class="carousel-item"> <img src="images/3.jpg" class="d-block w-100" height="350" width="50" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5></h5>
          <p></p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
</div>

<!-- Products -->

<div class="products">
<div class="container">
<div class="row">
  <div class="col-lg-6 offset-lg-3">
    <div class="section_title text-center">Popular on Book Store</div><hr />
    <div class="text-center">SEE BOOKS ALL<a href="books.php">&nbsp;&nbsp;Click!!</a></div>
  </div>
</div>

<div class="row products_row">
<div class="col-xl-12 col-md-12">
<div class="product">
<div class="row">
<!-- Product -->

  <?php foreach($row as $book) { ?>
  <div class="col-md-3"> <a href="book.php?bookisbn=<?php echo $book['book_isbn']; ?>"> <img style="height:300px; width:225px;" class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $book['book_image']; ?>"> </a> </div>
  <?php } ?>
</div>

<?php
  if(isset($conn)) {mysqli_close($conn);}
?>
  </div>
</div>
   <?php 
	 	require('publisher_list.php');
		require_once "./template/footer.php";
	 ?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> 
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>