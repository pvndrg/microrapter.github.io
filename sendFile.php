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


if(isset($_POST['submit'])!=""){
  $name=$_FILES['photo']['name'];
  $size=$_FILES['photo']['size'];
  $type=$_FILES['photo']['type'];
  $temp1=$_FILES['photo']['tmp_name'];
  //$caption1=$_POST['caption'];
  //$link=$_POST['link'];
  $dest=$_POST['destination'];
  move_uploaded_file($temp1,"files/".$name);
$insert=mysqli_query($conn,"insert into file(sender,name,receiver )values('$temp','$name','$dest')");
 //$update=mysql_query("update users set name = '$name' where email = '$dest'");
if($insert){
header("location:sendFile.php");
}
else{
die(mysql_error());
}
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


<h3><p align="center">Files Upload</p></h3>	
<form enctype="multipart/form-data" action="" name="form" method="post">


<table border="0" cellspacing="0" cellpadding="5" id="table">
<tr>
<td><th >TO:<label for="destination" ></label>
<input type="text" name="destination" id="to" size=40></th></td></tr><tr><br>
<th >Chosse Files</th>
<td ><label for="photo"></label>
<input type="file" name="photo" id="photo" /></td>
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