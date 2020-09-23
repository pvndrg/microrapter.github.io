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

<center>
<h2>Our Vision</h2><br>
<table style = "margin-bottom: 70px;"><tr><td>
<br><br><h3>Simple:-</h3>
<p><i>Whether your uploading, sharing or viewing files, everything is just a click away.</i></p>
<br><br><h3>Powerful:-</h3>
<p><i>View photos, videos, documents, presentations, spreadsheets, books, audio's, fonts and more online.</i></p>
<br><br><h3>Fast:-</h3>
<p><i>While your file are uploading you can share them instantly with link in real-time. No Waiting?</i></p>
<p><i>Every pixel is beautifully crafted to make it a great file sharing experience for everyone.</i></p>
<br><br><h3>Secure:-</h3>
<p><i>All file are encrypted and we ensure no one can gain unauthorized to access.</i></p>
<br><br><h3>Smart:-</h3>
<p><i>File or Folders are view in proper order based on the number and type of File you uploads.</i></p>

</td></tr></table>

</center>

<?php
require_once('footer.html');
?>
</body>
</html>