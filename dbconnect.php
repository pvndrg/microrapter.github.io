<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "microrapter";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if(!mysqli_connect("localhost","root","","microrapter"))
{
     die('oops connection problem ! --> '.mysql_error());
}
if(!mysqli_select_db($conn, "microrapter"))
{
     die('oops database selection problem ! --> '.mysql_error());
}
?>




