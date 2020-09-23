<?php
if(count($_FILES) > 0) {
if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
$imgData =addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
$imageProperties = getimageSize($_FILES['userImage']['tmp_name']);
//$sql = "INSERT INTO output_images(imageType ,imageData)
//VALUES('{$imageProperties['mime']}', '{$imgData}')";
$current_id = mysqli_query($conn,$sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysql_error());
}}
?>

<label>Upload Image File:</label><br/>
<input name="userImage" type="file" class="inputFile" />

