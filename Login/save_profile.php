<?php
session_start();
	if($_SESSION['UserID'] == "")
	{
		echo "Please Login!";
		exit();
	}
	$mysqli = mysqli_connect("localhost","root","12345678");
	mysqli_select_db($mysqli,"www_project");
	
	if($_POST["txtPassword"] != $_POST["txtConPassword"])
	{
		echo "Password not Match!";
		exit();
	}
	$strSQL = "UPDATE member SET Password = '".trim($_POST['txtPassword'])."',Username = '".trim($_POST['txtUsername'])."' 
	,email = '".trim($_POST['txtemail'])."' WHERE UserID = '".$_SESSION["UserID"]."' ";
	$objQuery = mysqli_query($mysqli,$strSQL);
	
	echo "Save Completed!<br>";		
	
	if($_SESSION["Status"] == "ADMIN")
	{
		echo "<br> Go to <a href='admin_page.php'>Admin page</a>";
	}
	else
	{
		echo "<script> alert('Password Save Compleate');</script>";
		
		echo "<script type=\"text/javascript\">window.location.href='../user_page.php';</script>";
	}
	
	mysqli_close($mysqli);
	
	?>