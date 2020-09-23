<?php

session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
 header("Location: fileSharing.php");
}
$temp = $_SESSION['user'];
echo  $temp;


$fileId = $_GET['id'];
echo $fileId;
$sql = "DELETE FROM file WHERE file_id = $fileId";
echo $sql;



// $row=mysql_fetch_array($res);
// mysql_query("DELETE FROM tbl_uploads WHERE id=".$_GET['remove_id']);
// unlink("uploads/".$row['file']);


    // $result = mysqli_query($conn,$sql);
    // $row = mysqli_fetch_assoc($result);

     mysqli_query($conn,$sql);

     if(mysqli_affected_rows($conn) > 0){
    
          unlink('files/'.$_GET['filename']);
    
         echo "Guest deleted successfully";
    
          header("Location:fileSharing.php");

     }else{
        
         echo "Could not delete guest";
     }




?>