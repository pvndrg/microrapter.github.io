<?php

include_once 'dbconnect.php';
session_start();
if(!isset($_SESSION['user']))
{
 header("Location: index.php");
}
    //print_r($_SESSION);
    $temp = $_SESSION['user'];
    //echo  $temp;
    $res=mysqli_query($conn,"SELECT * FROM users WHERE email='$temp'");
    $userRow=mysqli_fetch_array($res);

    // display contact
    $sql = "SELECT * FROM addContacts WHERE user_id = '".$userRow['user_id']."' ";
    $result = mysqli_query($conn,$sql);


    

    /*if(isset($_POST['submit']))
    {
    $destination = mysqli_real_escape_string($conn,$_POST['destination']);
    $personal_msg = mysqli_real_escape_string($conn,$_POST['message']);


    if(mysqli_query($conn,"INSERT INTO message(sender,receiver,personal_msg) VALUES('$temp','$destination','$personal_msg')"))
    {}
    }*/


    if(isset($_GET['testbutton']) != ""){
        //echo $_GET['testbutton'];
        $sql_msg = "SELECT * FROM message WHERE sender = '".$_SESSION['user']."' AND  receiver = '".$_GET['testbutton']."' OR sender = '".$_GET['testbutton']."' AND receiver = '".$_SESSION['user']."'";
       //echo $sql_msg;
        $result_msg = mysqli_query($conn,$sql_msg);
      //print_r($userRow);
        $sql_frnds = "SELECT * FROM addContacts WHERE user_id = '".$userRow['user_id']."' AND user_email = '".$_GET['testbutton']."'";
        echo $sql_frnds;
        $result_frnds = mysqli_query($conn,$sql_frnds);
        
    }
    else{
      //echo "value not set";
    }
      
      
      
    if(isset($_POST['activeEmail'])){
        
       

        
        $sql_insert = "INSERT INTO message SET sender = '".$_SESSION['user']."', receiver = '".$_GET['testbutton']."', personal_msg = '".$_POST['msgCon']."'";
        echo $sql_insert;
        if(mysqli_query($conn,$sql_insert)){
           //echo "Message Sent Succesfully";
           // header("Location:index.php");
        }else{
            echo "Message not sent.";
        }

        
      
        $sql_msg = "SELECT * FROM message WHERE sender = '".$_SESSION['user']."' AND  receiver = '".$_GET['testbutton']."' OR sender = '".$_GET['testbutton']."' AND receiver = '".$_SESSION['user']."'";
        //echo $sql_msg;
        $result_msg = mysqli_query($conn,$sql_msg);
      
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

<div class="container">
    <h3 class=" text-center">Messaging</h3>
   <!--- <h3 style = "float: right;"><a href="logout.php"><?php echo $_SESSION['user'] ?>&nbsp;Logout</a></h3>--->
    <h3><a href="addContact.php">Add Contact</a></h3>
        <div class="messaging" style="height:fit-content;">
            <div class="inbox_msg">
                <div class="inbox_people">
                    <div class="headind_srch">
                        <div class="recent_heading">
                            <h4>Recent</h4>
                        </div>
                        <div class="srch_bar">
                            <div class="stylish-input-group">
                                <input type="text" class="search-bar"  placeholder="Search" >
                                <span class="input-group-addon">
                                    <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                                </span> 
                            </div>
                        </div>
                    </div>

                    <div class="inbox_chat">
                        <?php 
                            while($row = mysqli_fetch_array($result)){
                        ?>
                        <form>
                            <button style=" border: none; margin: 5px;" type="submit" formmethod="get" name="testbutton" value="<?php echo $row['user_email'] ?>">
                                <div class="chat_list">
                                    <div class="chat_people">
                                        <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                        <div class="chat_ib">
                                            <h5><?php echo $row['user_name'] ?> <span class="chat_date">Dec 25</span></h5>
                                            <p>Test, which is a new approach to have all solutions 
                                                astrology under one roof.</p>
                                            <p class = "emailClass"><i><?php echo $row['user_email'] ?></i></p>
                                        </div>
                                    </div>
                                </div>
                            </button>
                        </form>
                        <?php } ?>
                        <script>
                            $(document).ready(function(){
                            var g_em = "";
                            $(".chat_list").click(function(){
                            var em = $(this).find(".emailClass").text();
                            $(this).addClass("active_chat");
                            $(this).siblings().removeClass("active_chat");
                            $(".sub-mesgs").css( "display", "block" );
                            $(".mesgs").css( "background", "white" );
                            g_em = em;
                            $(".activeEmail").val(em);
                            });

                                        
                            //console.log("value xx : "+xx);
                            var ui = $(".messages").html();
                            //alert("xx value"+ xx+", cmp value "+cmp+ "/n"+ui);
                            $( ".messages" ).each(function() {
                            var cmp = $(this).find(".sender_name").text();
                           // var xx = $( this ).val();//.value;
                            var nn = $(".email_frnds").text();
                            console.log("nn value: "+nn);
                            console.log(" cmp value: "+cmp);

                            if(nn != cmp){
                                console.log("cmp value pass ");
                                $(this).removeClass("incoming_msg");
                                $(this).addClass("outgoing_msg");
                                $(this).find(".messages1").removeClass("received_withd_msg");
                                $(this).find(".messages1").addClass("sent_msg");
                            }else{
                                console.log("cmp value fail ");
                                $(this).removeClass("outgoing_msg");
                                $(this).addClass("incoming_msg");
                                $(this).find(".messages1").removeClass("sent_msg");
                                $(this).find(".messages1").addClass("received_withd_msg");
                            }
                            });
                                        
                            });
                        </script>
                    </div>
                </div>
                
                <div class="mesgs">
                            
                    <?php 
                        if(isset($_GET['testbutton']) != "")
                        while($row_ct = mysqli_fetch_array($result_frnds)){ ?>
                    <div class="frndsDetails">
                        <div class="pro_frnds"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                        <div class="text_frnds">
                            <h6><?php echo $row_ct['user_name'] ?></h6>
                            <span class="email_frnds"><?php echo $row_ct['user_email'] ?></span>
                        </div>
                    </div>  
                    <?php } ?>

                    <div class="sub-mesgs" style="/*display:none;*/" >
                            
                        <div class="msg_history">
                            <?php 
                                if(isset($_GET['testbutton']) != "")
                                while($row_msg = mysqli_fetch_array($result_msg)){
                            ?>

                                <div class="messages incoming_msg">
                                    <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                        <div class="received_msg">
                                            <div class="messages1 received_withd_msg">
                                            <p><?php echo $row_msg['personal_msg'] ?></p>
                                            <p class="sender_name"><?php echo $row_msg['sender'] ?></p>
                                            <span class="time_date"> <?php echo $row_msg['when'] ?>   |    Yesterday</span></div>
                                        </div>
                                        </div>
                            <?php 
                                }            
                            ?>
                        </div>

                        <div class="type_msg">
                            <div class="input_msg_write">
                                <form action="<?php $_PHP_SELF ?>" method="post">
                                    <input type="text" class="write_msg" name="msgCon" placeholder="Type a message" />
                                    <input type="hidden" class="write_msg activeEmail" name="activeEmail" value="<?php echo (isset($testbutton))?$testbutton:'';?>" placeholder="Type a message" />
                                    <button class="msg_send_btn" name="sendMessage" type="submit" style="margin-right: 10px; margin-top: -5px;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                                </form>  
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
</div>
















<!---
<center><h2><center><h2>Personal Message </h2><br>
<h3><u>Message Box</u></h3></center>


<form enctype="multipart/form-data" action="" name="form" method="post">
<iframe src="pmessages_viewer.php" name="main_frame" width=100% height=80% align="left"></iframe>

<table border="0" cellspacing="0" cellpadding="5" id="table">
<tr>
<td><th >TO:-<label for="destination" ></label>
<input type="text" name="destination" id="to" size=40></th></td></tr><tr><br>
<th >Your Message:-</th>
<td ><label for="message"></label>
<textarea class=class="inputtext _58mg _5dba" data-type="text" name="message" value="" aria-required="1" placeholder="your message" id="u_0_8" aria-label="Re-enter Email"></textarea></th></td>
</tr>
<tr>
<th colspan="2" scope="row"><input type="submit" name="submit" id="submit" value="Submit" /></th>
</tr>
</table>
</form>--->


<?php
require_once('footer.html');
?>
</body>
</html>