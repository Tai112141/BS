<?php

	session_start();
	if($_SESSION['UserID'] == "")
	{
		echo "Please Login!";
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
<title>Edit profile</title>

</head>
<body>
<br/><br/>
<?php include('./template/header.php') ?>
<center>
<form name="form1" method="post" action="Login/save_profile.php">
  Edit Profile! <br>
  <table class="table table-light" width="600" border="0" style="width: 350px">
    <tbody>
      <tr>
        <td width="125"> &nbsp;UserID</td>
        <td width="180">
          <?php echo $objResult["UserID"];?>
        </td>
      </tr>
      <tr>
        <td> &nbsp;Username</td>
        <td>
          <input name="txtUsername" type="text" id="txtUsername" value="<?php echo $objResult["Username"];?>">
        </td>
      </tr>
      <tr>
        <td> &nbsp;Password</td>
        <td><input name="txtPassword" type="password" id="txtPassword" value="<?php echo $objResult["Password"];?>">
        </td>
      </tr>
      <tr>
        <td> &nbsp;Confirm Password</td>
        <td><input name="txtConPassword" type="password" id="txtConPassword" value="<?php echo $objResult["Password"];?>">
        </td>
      </tr>
      <tr>
        <td>&nbsp;Email</td>
        <td><input name="txtemail" type="text" id="txtemail" value="<?php echo $objResult["email"];?>"></td>
      </tr>
      <tr>
        <td> &nbsp;Status</td>
        <td>
          <?php echo $objResult["Status"];?>
        </td>
      </tr>
    </tbody>
  </table>
  <br>
 <button type="submit" name="Submit" value="Submit" class="btn-dark"><font color="#FFFFFF">Submit</font></button>
</form>
</center>
</div>
</body>
</html>