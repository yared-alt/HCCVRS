 
 <form method="post" enctype="multipart/form-data">
 	<?php
 if (isset($_POST['sub'])) {
 $target_path = "‪C:/xampp/htdocs/HCCV/uploads";  
$target_path = 'uploads/'.basename( $_FILES['photo']['name']);   
  
if(move_uploaded_file($_FILES['photo']['tmp_name'], $target_path)) {
	echo "file upload success";
 }
 else{
 	echo "faild to upload";
 }}
 ?>
 <input type="file" name="photo">
 <input type="submit" name="sub">

 </form>