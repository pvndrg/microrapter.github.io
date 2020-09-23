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


if(isset($_POST['submit']))
{

 $Group_msg = mysqli_real_escape_string($conn,$_POST['message']);


 if(mysqli_query($conn,"INSERT INTO group_message(sender,group_msg) VALUES('$temp','$Group_msg')"))
 {}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $userRow['email']; ?></title>
<link rel="stylesheet" href="style.css" type="text/css" />
<style>
body{ font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;}
a{color:#666;}
#table{margin:0 auto;background:#333;box-shadow: 5px 5px 5px #888888;border-radius:10px;color:#CCC;padding:10px;}
#table1{margin:0 auto;}
</style>
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

<center><h2>Group Chatting </h2><br>
<h3><u>Message Box</u></h3></center>


<iframe src="gmessages_viewer.php" name="main_frame" width=100% height=80% align="left"></iframe>
<form enctype="multipart/form-data" action="" name="form" method="post">
<table border="0" cellspacing="0" cellpadding="5" id="table">
<tr><br>
<th >Your Message:-</th>
<td ><label for="message"></label>
<textarea class=class="inputtext _58mg _5dba" data-type="text" name="message" value="" aria-required="1" placeholder="your message" id="u_0_8" aria-label="Re-enter Email"></textarea></th></td>
</tr>
<tr>
<th colspan="2" scope="row"><input type="submit" name="submit" id="submit" value="Submit" /></th>
</tr>
</table>
</form>

<?php
require_once('footer.html');
?>
</body>
</html>