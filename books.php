<?php
  session_start();
  $count = 0;
  // connecto database
  require_once "./functions/database_functions.php";
  $conn = db_connect();

  $query = "SELECT book_isbn, book_image FROM books";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }

  $title = "Full Catalogs of Books";
  require_once "./template/header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Category</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Little Closet template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>


<h1 class="text-center">Full Catalogs of Books</h1>
<!----<div class="products_dropdown product_dropdown_sorting">
  <div class="isotope_sorting_text"><span>Default Sorting</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>
  <ul>
    <li class="item_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'>Default</li>
    <li class="item_sorting_btn" data-isotope-option='{ "sortBy": "price" }'>Price</li>
    <li class="item_sorting_btn" data-isotope-option='{ "sortBy": "name" }'>Name</li>
  </ul>
</div>---------->
<hr />
<div class="row page_nav_row">
  <div class="col">
    <div class="page_nav">
      <ul class="d-flex flex-row align-items-start justify-content-center">
        <li><a href="category.php">Fiction / novels</a></li>
        <li><a href="category.php">
Exercise</a></li>
        <li><a href="category.php">Biography</a></li>
        <li><a href="category.php">Story</a></li>
      </ul>
    </div>
  </div>
</div>

</br></br>
<?php for($i = 0; $i < mysqli_num_rows($result); $i++){ ?>
<div class="container">
<div class="row">
  <?php while($query_row = mysqli_fetch_assoc($result)){ ?>
  <div class="col-md-3"> <a href="book.php?bookisbn=<?php echo $query_row['book_isbn']; ?>"> <img style="height:300px; width:225px;" class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $query_row['book_image']; ?>"></a> </div>
  <?php
          $count++;
          if($count >= 4){
              $count = 0;
              break;
            }
          } ?>
</div>
</div>
<br/>
<?php
      }
  if(isset($conn)) { mysqli_close($conn); }
  require_once "./template/footer.php";
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> 
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 </body>
 </html>