<?php

include ('template/header.php');

	session_start();
	if($_SESSION['UserID'] == "")
	{
		echo "Please Login!";
		exit();
	}

	if($_SESSION['Status'] != "USER")
	{
		echo "This page for User only!";
		exit();
	}	
	
	$mysqli = mysqli_connect("localhost","root","12345678");
	mysqli_select_db($mysqli,"www_project");
	$strSQL = "SELECT * FROM member WHERE UserID = '".$_SESSION['UserID']."' ";
	$objQuery = mysqli_query($mysqli,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
?>
<html>
<head>
<title>user page</title>
</head>
<body>
<?php
echo "<div class='container'>";
echo "<div style='width:100%' class='alert alert-info' role='alert'>
<h2>Welcome!!!&nbsp;</h2>

</div>";
?>
  <h3 style="color:#000"><?php echo "HI ~~&nbsp".$objResult["Username"]?></h3><br>
  <table border="0" style="width: 300">
    <tbody>
    <img style="height:150px;" src="img/user.png">
    </br>
      <tr>
        <td width="87"> &nbsp;Username</td>
        <td width="197"><?php echo $objResult["Username"];?>
        </td>
      </tr>
      <tr>
        <td> &nbsp;Email</td>
        <td><?php echo $objResult["email"];?></td>
      </tr>
    </tbody>
  </table>
  <br>
  <a href="edit_profile.php">Edit Profile</a><br>
  
  <a href="Login/logout.php">Logout</a>
</body>
</html>