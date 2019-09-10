
<?php
	session_start();
	require_once "./functions/database_functions.php";
	$conn = db_connect();

	$query = "SELECT * FROM category ORDER BY categoryid";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't retrieve data " . mysqli_error($conn);
		exit;
	}
	if(mysqli_num_rows($result) == 0){
		echo "Empty category ! Something wrong! check again";
		exit;
	}

	$title = "List Of Publishers";
	require "./template/header.php";
?>
<div class="col-xl-12 col-md-12">
	 <div class="section_title text-center">Category<a href="category.php"/></div><hr />
	<br />
      <ul>

	<?php 
	
	
		while($row = mysqli_fetch_assoc($result)){
			$count = 0; 
			$query = "SELECT categoryid FROM books";
			$result2 = mysqli_query($conn, $query);
			
			if(!$result2){
				echo "Can't retrieve data " . mysqli_error($conn);
				exit;
			}
			while ($pubInBook = mysqli_fetch_assoc($result2)){
				if($pubInBook['categoryid'] == $row['categoryid']){
					$count++;
				}
			}
			

	?>
<a href="bookPerCat.php?catid=<?php echo $row['categoryid']; ?>"></a>
		
	<?php } ?>
</ul>
</div>	

<?php
	mysqli_close($conn);
?>