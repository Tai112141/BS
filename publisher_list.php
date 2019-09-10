
<?php
	session_start();
	require_once "./functions/database_functions.php";
	$conn = db_connect();

	$query = "SELECT * FROM publisher ORDER BY publisherid";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't retrieve data " . mysqli_error($conn);
		exit;
	}
	if(mysqli_num_rows($result) == 0){
		echo "Empty publisher ! Something wrong! check again";
		exit;
	}

	$title = "List Of Publishers";
	require "./template/header.php";
?>
<div class="col-xl-12 col-md-12">
	 <div class="section_title text-center">List of Publisher<a href="publisher_list.php"/></div><hr />
	<br />
      <ul>

	<?php 
	
	
		while($row = mysqli_fetch_assoc($result)){
			$count = 0; 
			$query = "SELECT publisherid FROM books";
			$result2 = mysqli_query($conn, $query);
			
			if(!$result2){
				echo "Can't retrieve data " . mysqli_error($conn);
				exit;
			}
			while ($pubInBook = mysqli_fetch_assoc($result2)){
				if($pubInBook['publisherid'] == $row['publisherid']){
					$count++;
				}
			}
			

	?>
<a href="bookPerPub.php?pubid=<?php echo $row['publisherid']; ?>">  <img style="width:250px" class="" src="./img/author/<?php echo $row['photo']; ?>"></a>
		
	<?php } ?>
</ul>
</div>	

<?php
	mysqli_close($conn);
?>