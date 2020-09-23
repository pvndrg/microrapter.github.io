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
$res1=mysqli_query($conn,"SELECT username FROM users WHERE email='$temp'");
$userRow=mysqli_fetch_array($res);
$userRow1=mysqli_fetch_array($res1);



if(isset($_POST['submit'])!=""){
  $name=$_FILES['photo']['name'];
  $size=$_FILES['photo']['size'];
  $type=$_FILES['photo']['type'];
  $temp=$_FILES['photo']['tmp_name'];
  $caption1=$_POST['caption'];
  $link=$_POST['link'];
  move_uploaded_file($temp,"files/".$name);


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


<table border="1" align="center" id="table1" cellpadding="0" cellspacing="0">
<tr><td colspan=2 align="center">Click to Download</td></tr>
<tr><td>Sender Name</td><td>File Name</td></tr>
<?php
//$select=mysql_query("select * from users order by user_id desc ");
$select=mysql_query("select * from file where receiver ='$temp'");
//$select=mysql_query("select * from file where username=);

while($row1=mysql_fetch_array($select)){
	$name=$row1['sender'];
	$name1=$row1['name']
	$name2=$row1['when'];
	
	
	$sWhen = date("H:i:s['when']);
	
?>

<tr>
<td width="300"><img src="  Buddy-Green.ico" width="14" height="14"><?php echo $name ;?></td>
<td><img src="tick.png" width="14" height="14"><a href="download.php?filename=<?php echo $name1;?>"><?php echo $name1 ;?></a>
</td>   
 <td width="300"><img src="  Buddy-Green.ico" width="14" height="14"><?php echo $name2 ;?></td>       
</tr>

<?php }?>


<?php
require_once('footer.html');
?>
</body>
</html>