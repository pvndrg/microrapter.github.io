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
<style>
body{ font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;}
a{color:#666;}
#table{margin:0 auto;background:#333;box-shadow: 5px 5px 5px #888888;border-radius:10px;color:#CCC;padding:10px;}
#table1{margin:0 auto;}
</style>
<table width=60% align="center" id="table1" cellpadding="0" cellspacing="0">

<tr><td><u>Sender Name</u></td><td><u>Message</u></td></tr>
<?php
//$select=mysql_query("select * from users order by user_id desc ");
//$select=mysql_query("select * from message where receiver ='$temp' || sender='$temp'");
$select = mysqli_query($conn,"SELECT * FROM `group_message` ORDER BY `msg_id` ASC LIMIT 15");

while($row1=mysqli_fetch_array($select)){
	$name=$row1['sender'];
	$name1=$row1['group_msg']
	//$name2=$row1['when'];
	//$sWhen = date("H:i:s['when']);

	
?>

<tr>
<td width="300"><img src="  Buddy-Green.ico" width="14" height="14"><?php echo $name ;?></td>
<td><img src="EMAIL_1.ICO" width="14" height="14"><?php echo $name1 ;?></td>   
<!-- <td width="300"><img src="Calendar.png" width="14" height="14"><?php echo $name2 ;?></td>   -->        
</tr>

<?php }?>
