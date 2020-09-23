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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
body{ font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;}
a{color:#666;}
#table{margin:0 auto;background:#333;box-shadow: 5px 5px 5px #888888;border-radius:10px;color:#CCC;padding:10px;}
#table1{margin:0 auto;}

ol li{
  padding-bottom: 10px;
}
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
  
  <div class="container" style="margin-bottom: 40px;">
    <div class="card">
      <div class="card-header">
        <h2>HELP</h2> 
      </div>

      <!-- <table border="1" align="center" id="table1" cellpadding="0" cellspacing="0">
      <tr><td colspan=2 align="center"><h2>HELP</h2></td></tr>
      <tr><td> -->

      <div class="card-body">
       <ol style="padding-left:20px;">
         <li>First you have to sign up with your all profile information.</li>
         <li>Now you sign in.</li>
         <li>You go to home page of this site.</li>
         <li>Now if you want to see your profile, go to MYPROFILE.</li>
         <li>This site is for communicate with other, so main is that to share and chat<br>
          to share or chat you have to go MENU option.</li>
         <li>If you want to share file or data,you have go to FILE SHARING option,here,select 
          the FILE SHARE option,select the file and provide the destination or receiver name and send.</li>
         <li>If you want to view or download file which is sended by your friend,go to 
          RECEIVED FILE and you see the table like structure ,here the sender name and the
          file is seen.to download the file click on file name.</li>
         <li>If you want to chat ,go to CHATTING menu and you get two option the group chat
          & individual cat.</li>
         <li>In group chat all the legel user can chat in group.</li>
         <li>In individual chat the user can chat with only with there friend.</li>
         <li>If you want to change setting you have to go setting option,and 
          update profile as rename & change password.</li>
         <li>If you have any problem related to this site you can contact with us.</li>
        </ol>
        <!-- </td></tr></table> -->

      </div>
    </div>
  </div>

<?php
require_once('footer.html');
?>

</body>
</html>