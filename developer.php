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

<table width=100% align="center">
<tr>
<td>Developed by:-</td>
<td></td>
</tr>
<tr>
<td></td>
<td><b>Pravin Durge</b><br> <i>-as a Group leader.</i></td>
</tr>
<tr>
<td></td>
<td><b>Shyam Sharma</b><br><i> -as a Group Member.</i></td>
</tr>
<tr>
<td></td>
<td><b>Aradhana Prasad</b><br><i> -as a Group Member.</i></td>
</tr>
</table>


<?php
require_once('footer.html');
?>

</body>
</html>