<?php
$conn = mysql_connect("localhost", "root", "");
mysql_select_db("users") or die(mysql_error());
if(isset($_GET['user_id'])) {
$sql = "SELECT imageType,pic FROM users WHERE user_id=" . $_GET['user_id'];
$result = mysqli_query($conn,"$sql") or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysql_error());
$row = mysqli_fetch_array($result);
header("Content-type: " . $row["imageType"]);
echo $row["pic"];
}
mysql_close($conn);
?>