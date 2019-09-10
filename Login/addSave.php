<?php
	$mysqli = mysqli_connect("localhost","root","12345678");
	mysqli_select_db($mysqli,"www_project");
	
	if(trim($_POST["txtUsername"]) == "")
	{
		echo "Please input Username!";
		exit();	
	}
	
	if(trim($_POST["txtPassword"]) == "")
	{
		echo "Please input Password!";
		exit();	
	}	
		
	if($_POST["txtPassword"] != $_POST["txtConPassword"])
	{
		echo "Password not Match!";
		exit();
	}
	
	if(trim($_POST["txtemail"]) == "")
	{
		echo "Please input Name!";
		exit();	
	}	
	
	$strSQL = "SELECT * FROM member WHERE Username = '".trim($_POST['txtUsername'])."' ";
	$objQuery = mysqli_query($mysqli,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if($objResult)
	{
			echo "Username already exists!";
	}
	else
	{	
		
		$strSQL = "INSERT INTO member (Username,Password,email,Status) VALUES ('".$_POST["txtUsername"]."', 
		'".$_POST["txtPassword"]."','".$_POST["txtemail"]."','".$_POST["ddlStatus"]."')";
		$objQuery = mysqli_query($mysqli,$strSQL);
		if($objQuery){
				
               echo "<script> alert('Register Complete...');</script>";
		
		echo "<script type=\"text/javascript\">window.location.href='login-form.html';</script>";
            }else{
                echo "<script>Register Fail [Username & ID is used]</script>";
            }
		
	}

	mysqli_close($mysqli);
?>
