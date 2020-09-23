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


<table width=100% height=95%>
<tr>
<td width=70% height=50%><center><img src="Titlebgl.png" width=70% height=05%>
	<p>
	<h3><i><br><br>Microraptor is one of the best site for Communication (File Sharing and Chatting) in world wild area.
	<br>We know that your data is very sensitive.<br> So we are event only for you to share your
	data with high security.<br> your data is safe.
	</i></h3></p></center>
</td>
<td width=30% height=50%><center><img src="Microraptor_Figure.png" width=50% height=50%></center></td>
</tr>
</table>


<?php
require_once('footer.html');
?>

</body>
</html>