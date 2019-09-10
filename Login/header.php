<!DOCTYPE html>
<html lang="en">
<head>
<title>bookstore</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Little Closet template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="images/icons/reading.png"/>
<link rel="stylesheet" type="text/css" href="../styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="../styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="../styles/responsive.css">

</head>
<body>

<!-- Menu -->

<div class="menu">

	<!-- Search -->
	<div class="menu_search">
		<form action="../BS/search.php" method="get" id="menu_search_form" class="menu_search_form">
			<input type="text" name="query" class="search_input" placeholder="Search" required>
			<button type="submit" value="Search" class="menu_search_button"><img src="images/search.png" alt=""></button>
		</form>
	</div>


</div>


<div class="container-fluid">
	<!-- Header -->

	<header class="header">
		<div class="header_overlay"></div>
		<div class="header_content d-flex flex-row align-items-center justify-content-start">
			<div class="logo">
				<a style="text-decoration:none;" href="index.php">
					<div class="d-flex flex-row align-items-center justify-content-start">
						<div><img src="images/logo.jpg" alt="index.php"></div>
						<div style="color:#000">BOOK STORE</div>
					</div>
				</a>	
			</div>

			
			<div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">

				<!-- Search -->
				<div class="header_search">
					<form action="../BS/search.php" method="get" id="header_search_form">
						<input type="text" name="query" class="search_input" placeholder="Search" required>
						<button type="submit" value="Search" class="menu_search_button"><img src="images/search.png" alt=""></button>
					</form>
				</div>
      <!-- Cart -->
				<div class="cart"><a href="cart.php"><div><img class="svg" src="images/cart.svg" alt="https://www.flaticon.com/authors/freepik"></div></a></div>
				
			</div>
   
				<!-- User -->
				
                
                <?php include ('login/login_sesstion.php')?>
				
		</div>
	</header><br/><br/><br/><br/>
  