<?php
	session_start();
	$mysqli = mysqli_connect("localhost","root","12345678");
	mysqli_select_db($mysqli,"www_project");
	$strSQL = "SELECT * FROM member WHERE Username = '".mysqli_real_escape_string($mysqli,$_POST['txtUsername'])."' 
	and Password = '".mysqli_real_escape_string($mysqli,$_POST['txtPassword'])."'";
	$objQuery = mysqli_query($mysqli,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if(!$objResult)
	{
			echo "<script> alert('Username or Password Incorrect..');</script>";
		
		echo "<script type=\"text/javascript\">window.location.href='login-form.html';</script>";
	}
	else
	{
			$_SESSION["UserID"] = $objResult["UserID"];
			$_SESSION["Status"] = $objResult["Status"];

			session_write_close();
			
			if($objResult["Status"] == "ADMIN")
			{
				header("location:admin_page.php");
			}
			else
			{
				header("location:../index.php");
			}
	}
	mysqli_close($mysqli);
?>