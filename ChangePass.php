<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
 header("Location: index.php");
}
$temp = $_SESSION['user'];
//echo  $temp;
$res=mysqli_query($conn,"SELECT * FROM users WHERE email='$temp'");
$userRow=mysqli_fetch_array($res);



    $change_pwd_error='';
    if(isset($_POST['change_pwd']))
    {
	$email=$_POST['email'];
	$old_password=$_POST['old_password'];
	$new_password=$_POST['new_password'];
	$con_password=$_POST['con_password'];
	$chg_pwd=mysqli_query($conn,"select * from users where email='$temp'");
	$chg_pwd1=mysqli_fetch_array($chg_pwd);
	$data_pwd=$chg_pwd1['password'];
	
	if($data_pwd==$old_password)
		{
		if($new_password==$con_password)
			{
				$update_pwd=mysqli_query($conn,"update users set password='$new_password' where email='$temp'");
				$change_pwd_error="Update Sucessfully !!!";
			 }
		else{
		  $change_pwd_error="Your new and Retype Password is not match !!!";
		 }
		}
	else
		{
		  $change_pwd_error="Your old password is wrong !!!";
		}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $userRow['email']; ?></title>
<link rel="stylesheet" href="style.css" type="text/css" />


</head>
<body>

<div id="header">
 <div id="left">
    <label>MICRORAPTER</label>
    </div>
    <div id="right">
     <div id="content">
	 hi' <a href="myprofile.php"><?php echo $userRow['firstname']; ?> <?php echo $userRow['lastname']; ?></a>&nbsp;<a href="logout.php?logout">Sign Out</a>
        </div>
    </div>	
</div>



<?php
require_once('menu.html');
?>

<!--
<fieldset>
<legend>Change Password</legend>

<form method="post">
<dl><dt>E-mail</dt>
<dd><input type="email" name="email"  value="" required ></dd></dl>
<dl><dt>Old Password</dt>
<dd><input type="password" name="old_password"  value="" required ></dd></dl>
<dl><dt>New Password</dt>
<dd><input type="password" name="new_password"  value=""  required></dd></dl>
<dl><dt>Retype New Password</dt>
<dd><input type="password" name="con_password"  value="" required ></dd></dl>
<p align="center"><input type="submit" value="Change" name="change_pwd"></p>
</form>
</fieldset>
-->

<div id="login-form">
<p align="center" class="error"><?php echo $change_pwd_error ?></p>
<form method="post">

   <center> <h2>Change Password</h2> </center>

     
    
<table align="center" width="100%" border="0">

<tr>

<td colspan=2><input type="text" class="inputtext _58mg _5dba" data-type="text" name="email" value="" aria-required="1" placeholder="Email or Mobile Number" id="u_0_5" aria-label="Your Email"></td></tr>
<tr>

<td colspan=2><input type="password" class="inputtext _58mg _5dba" data-type="text" name="old_password" aria-required="1" placeholder="Old Password" id="u_0_a" value="" aria-label="New Password"></td></tr>

<tr>

<td colspan=2><input type="password" class="inputtext _58mg _5dba" data-type="text" name="new_password" aria-required="1" placeholder="New Password" id="u_0_a" value="" aria-label="New Password"></td></tr>

<tr>

<td colspan=2><input type="password" class="inputtext _58mg _5dba" data-type="text" name="con_password" aria-required="1" placeholder="Re-enter New Password" id="u_0_a" value="" aria-label="New Password"></td></tr>


<tr>
<td colspan=2><button type="submit"  value="Change" name="change_pwd">Chenge My Password</button></td>
</tr>

</table>
</form>
</div>
</center>



<?php
require_once('footer.html');
?>

</body>
</html>