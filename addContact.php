<?php

session_start();
include_once 'dbconnect.php';
require_once 'contactValidation.php';


if(!isset($_SESSION['user']))
{
 header("Location: index.php");
 exit;
}	

    $temp = $_SESSION['user'];
    //echo  $temp;
    $res=mysqli_query($conn,"SELECT * FROM users WHERE email='$temp'");
    $userRow=mysqli_fetch_array($res);


    $errors = array();

    if(isset($_POST['save'])){

        $errors = validate_signup();

        if(count($errors) == 0){

            // Profile photo
            $src = $_FILES['photo']['tmp_name'];
            $dest = 'contactImages/'.$_FILES['photo']['name'];
            $photo='';
                
            if(move_uploaded_file($src,$dest)){
                $photo = $_FILES['photo']['name'];

                /*$sql = "INSERT INTO guests set first_name='".$_POST['first_name']."', last_name='".$_POST['last_name']."', email_address='".$_POST['email_address']."',  address='".$_POST['address']."', gender='".$_POST['gender']."', hobbies='".implode(', ',$_POST['hobbies'])."', photo='".$photo."', created=NOW()";

                if(mysqli_query($conn,$sql)){
                    header("Location:index.php");
                }else{
                    echo "Could Not Add Guest.";
                }*/

                $sql = "INSERT INTO addContacts set user_id = '".$userRow['user_id']."', user_name = '".$_POST['name']."', user_email = '".$_POST['email']."', photo='".$photo."',created = NOW()";
                echo $sql;
                if(mysqli_query($conn,$sql)){

                    echo "Contact saved";
                    header("Location:addContact.php");
                }
                else{

                    echo "Not Saved Contact";
                }
            }
        }

    }



?>









<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $userRow['email']; ?></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="IndividualChatStyle.css" type="text/css" />

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
    
    <center>
        <div class="container" style="margin-bottom: 50px;">
            <table border="1" align="center">
                
                <form method = "POST" enctype="multipart/form-data">

                    <?php if(count($errors) > 0){ ?>

                        <tr><td colspan="2"><font color="#FF0000"><?php echo implode('<br>',$errors); ?></font><td></tr>
                    
                    <?php } ?>


                    <tr>
                        <td>Name :</td>
                        <td><input type="text" name = "name" value = "<?php echo isset($_POST['name']) ? $_POST['name'] : '';?>" placeholder = "Name"></td>
                    </tr>

                    <tr>
                        <td>Email :</td>
                        <td><input type="email" name = "email" value = "<?php echo isset($_POST['email']) ? $_POST['email'] : '';?>" placeholder = "Email"></td>
                    </tr>

                    <tr>
                        <td>Profile Photo</td>
                        <td><input type="file" name="photo" value="<?php echo isset($_POST['photo'])? $_POST['photo']:''; ?>" /></td>
                    </tr>
                    
                    <tr>
                        <td colspan="2"><input type ="submit" name = "save" value = "Save"></td>
                    </tr>
                </form>

            </table>
        </div>
    </center>
    <?php
        require_once('footer.html');
    ?>
</body>
</html>