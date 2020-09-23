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
//$userRow1=mysql_fetch_array($res1);





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
header("location:fileSharing.php");
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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
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
<tr><td colspan=4 align="center">Click to Download</td></tr>
<tr><td>Sender Name</td><td>File Name</td><td>Date Time</td><td  align="center">Action</td></tr>
<?php
//$select=mysql_query("select * from users order by user_id desc ");
$select=mysqli_query($conn,"select * from file where receiver ='$temp'");
//$select=mysql_query("select * from file where username=);

while($row1=mysqli_fetch_array($select)){
	$name=$row1['sender'];
  $name1=$row1['name'];
  $id=$row1['file_id'];
  

?>

  <tr>
    <td width="300"><img src="  Buddy-Green.ico" width="14" height="14"><?php echo $name ;?></td>
    <td><img src="tick.png" width="14" height="14"><a href="download.php?filename=<?php echo $name1;?>"><?php echo $name1 ;?></a></td>
    <td width="300"><?php echo $row1['when']?></td>
    <td width="200" align="center">
    <a href="download.php?filename=<?php echo $name1;?>">
      <i class="fa fa-floppy-o" aria-hidden="true" style="font-size: 25px;"></i>
    </a>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <a href="deleteFile.php?id=<?php echo $id;?>&filename=<?php echo $name1;?>" onclick="alert('Delete File...!');">
      <i class="fa fa-trash" aria-hidden="true" style="font-size: 25px; color: red;"></i></td>
    </a>
  </tr>

<?php }?>

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