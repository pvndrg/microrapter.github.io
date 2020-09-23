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

//$sql = "SELECT imageId FROM output_images ORDER BY imageId DESC"; 
//$result = mysql_query($res);


?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
    body {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    }

    a {
        color: #666;
    }

    #table {
        margin: 0 auto;
        background: #333;
        box-shadow: 5px 5px 5px #888888;
        border-radius: 10px;
        color: #CCC;
        padding: 10px;
    }

    #table1 {
        margin: 0 auto;
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
                hi' <a href="myprofile.php"><?php echo $userRow['firstname']; ?>
                    <?php echo $userRow['lastname']; ?></a>&nbsp;<a href="logout.php?logout">Sign Out</a>
            </div>
        </div>
    </div>


    <?php
require_once('menu.html');
?>









    <div id="login-form">
        <center>
            <h2><b>My Profile</b></h2>
        

        <div class="container" style="margin-bottom:40px;">
            <div class="card" style="width:400px">
                <img class="card-img-top" src="registerImages/<?php echo $userRow['avatar']; ?>" alt="Card image"
                    style="width:100%">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $userRow['firstname']; ?> <?php echo $userRow['lastname']; ?></h4>
                    <div class="card-text">
                        <p><?php echo $userRow['sex']; ?></p>
                        <p><?php echo $userRow['day']; ?> / <?php echo $userRow['month']; ?> /
                            <?php echo $userRow['year']; ?></p>
                        <p><?php echo $userRow['email']; ?></p>
                    </div>
                    <!-- <a href="#" class="btn btn-primary">See Profile</a> -->
                </div>
            </div>


        </div>


        </center>

        <?php
require_once('footer.html');
?>

</body>

</html>