
<?php
	
	error_reporting(0);
	$mysqli = mysqli_connect("localhost","root","12345678");
	mysqli_select_db($mysqli,"www_project");
	$strSQL = "SELECT * FROM member WHERE UserID = '".$_SESSION['UserID']."' ";
	$objQuery = mysqli_query($mysqli,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);

if (!session_id())session_start();
	
	 ?>
 <?php if( isset($_SESSION['UserID']) && !empty($_SESSION['UserID']) )
{
?> 
<div class="user"><a href="user_page.php"><div><img src="images/user.svg" alt="https://www.flaticon.com/authors/freepik"></div></a></div>
<b style="text-transform:uppercase">

<?php echo $objResult["Username"];?></link>
</b>&nbsp;|&nbsp;
<a style="text-decoration:none; color:#F00;" href="login/logout.php"><b>LOGOUT</b></a>&nbsp;&nbsp;&nbsp;
<?php }else{ ?>

     <a style="color:#000; text-decoration:none;"  href="login/login-form.html"><b>LOGIN</b></a>&nbsp;|&nbsp;
     
     <a style="color:#000; text-decoration:none;" href="login/registerform.html"><b>REGISTER</b></a>
<?php } ?>
                      
	