<?php

$con= mysqli_connect("localhost","root","12345678","www_project") or die("Error: " . mysqli_error($con));
mysqli_query($con, "SET NAMES 'utf8' ");

$query = "SELECT * FROM orders ORDER BY orderid asc" or die("Error:" . mysqli_error()); 
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result . 
$result = mysqli_query($con, $query); 
 
require("./template/admin-header.php");
	
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>admin</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Little Closet template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="images/icons/reading.png"/>
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">

<body>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
  <div class="box-body">&nbsp;
    <h2>Order..</h2>
    <div align="right"><a  href="admin_book.php">
      <button class="btn-danger">Back</button>
      </a></div>
    <?php
              echo "<table>";
//หัวข้อตาราง
echo "<tr align='center' bgcolor='#CCCCCC'><td>OrderID</td><td>CustomerID</td><td>Amount</td><td>Date</td><td>Name</td><td>Address</td><td>Code</td><td>Country</td></tr>";
while($row = mysqli_fetch_array($result)) { 
  echo "<tr>";
  echo "<td>" .$row["orderid"] .  "</td> "; 
  echo "<td>" .$row["customerid"] .  "</td> "; 
    echo "<td>" .$row["amount"] ."</td> "; 
	echo "<td>" .$row["date"] ."</td> ";
  echo "<td>" .$row["ship_name"] .  "</td> ";
  echo "<td>" .$row["ship_address"] .  "</td> ";
  echo "<td>" .$row["ship_zip_code"] .  "</td> ";
  echo "<td>" .$row["ship_country"] .  "</td> ";
  //แก้ไขข้อมูล
   
  
  //ลบข้อมูล

  echo "</tr>";
}
echo "</table>";
//5. close connection
mysqli_close($con);
?>
  </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery.min.js" type="text/javascript"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.min.js" type="text/javascript"></script> 
<script src="js/menumaker.js" type="text/javascript"></script> 
<script type="text/javascript" src="js/jquery.sticky.js"></script> 
<script type="text/javascript" src="js/sticky-header.js"></script>
</body>
</html>