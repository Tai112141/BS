<?php
    $mysqli = mysqli_connect("localhost", "root", "12345678") or die("Error connecting to database: ".mysqli_error($mysqli));     
    mysqli_select_db($mysqli,"www_project") or die(mysqli_error($mysqli));
   
?>

 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Search results</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<?php
   $query = $_GET['query']; 
    // gets value sent over search form
     
    $min_length = 3;
    // you can set minimum length of the query if you want
     
    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
         
        $query = htmlspecialchars($query); 
        // changes characters used in html to their equivalents, for example: < to &gt;
         
        $query = mysqli_real_escape_string($mysqli,$query);
        // makes sure nobody uses SQL injection
         
        $raw_results = mysqli_query($mysqli,"SELECT * FROM books
            WHERE (`book_author` LIKE '%".$query."%')OR(`book_price` LIKE '%".$query."%')OR(`book_isbn` LIKE '%".$query."%') OR (`book_title` LIKE '%".$query."%') OR (`book_author` LIKE '%".$query."%')") or die(mysqli_error($mysqli));
             
      ?>
      <?php
         
        if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
             
            while($results = mysqli_fetch_array($raw_results)){
            // $results = mysqli_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
			include('template/header.php');
             	echo '<img src="./bootstrap/img/'.$results['book_image'].'" height="250">';
				echo "<p><h3 >"."ISBN".":".$results['book_isbn']."</h3></p>";
                echo "<p><h3 >"."Name".":".$results['book_title']."</h3></p>";
				
?>

	<a href="book.php?bookisbn=<?php echo $results['book_isbn'];?>" class="btn btn-primary">Get Details</a>

	           <?php       
            }
             
        }
        else{ // if there is no matching rows do following
            echo "<script> alert('No Result');</script>";
		
		echo "<script type=\"text/javascript\">window.location.href='index.php';</script>";
        }
         
    }    
?>
 
</body>
</html>