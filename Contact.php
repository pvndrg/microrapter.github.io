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


<div class="container row" style="padding-left: 100px; margin-bottom: 50px;">
    <div class="col d-flex justify-content-center">
        <div class="card" style="width:60%; box-shadow: 8px 10px 10px 2px lightgrey;">
            <div class="card-header">
                <h5>Contact us and we'll get back to you within 24 hours.</h5>
            </div>
            <div class="card-body">
                <P> Ballarpur, IND</P>
                <P> +91 9158563915</P>
                <P>pvndrg@hotmail.com</P>
            </div>
        </div>
    </div>




    <!-- <table width=100% align="center">
    <tr><td>
    <P></P><br><br>
    </DIV>
    </td>
    <td> -->

    <div id="login-form col">
        <form method="post" style="box-shadow: 8px 10px 10px 10px lightgrey;">

            <center><h2>Contact</h2></center>
        
        
            <table align="center" width="90%" border="0">
                <tr>

                <td colspan=2><input type="text" class="inputtext _58mg _5dba" data-type="text" name="email" value="" aria-required="1" placeholder="Email or Mobile Number" id="u_0_5" aria-label="Your Email"></td></tr>
                <tr>

                <td colspan=2><input type="text" class="inputtext _58mg _5dba" data-type="text" name="subject" value="" aria-required="1" placeholder="Subject" id="u_0_8" aria-label="Re-enter Email"></td></tr>
                <tr><td>
                Message:
                    <textarea id = "contactTextarea" name="text_comment" class=class="inputtext _58mg _5dba" data-type="text" name="message" value="" aria-required="1" placeholder="subject" id="u_0_8" aria-label="Re-enter Email" rows="3" cols="30">your solution .</textarea>
                </td></tr><tr>
                <td colspan=2><button type="submit" name="btn-signup">Send me Feedback</button></td>
                </tr>
            </table>
        </form>
    </div>
      
</div>

<?php
require_once('footer.html');
?>
</body>
</html>