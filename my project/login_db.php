<?php
$con =mysqli_connect("localhost","root","","login_db");
// echo "<pre>";
//  print_r($_FILES); #it is a type of http method like get and post for upload image, audio etc

// CREATE TABLE posts(id int PRIMARY KEY AUTO_INCREMENT, title varchar(50) not null, post_imag varchar(50));
if (!empty($_POST['title'])) {
$title=$_POST['title'];
$img_name = $_FILES['IMG']['name'];
$temp_img=$_FILES['IMG']['tmp_name'];
$destination = "upload_files/$img_name";
$up=move_uploaded_file($temp_img,$img_name);
$sql= "Insert Into posts(title,post_img)Values('$title','$img_name')";
$rs=mysqli_query($con,$sql);
if($rs){
   echo "Record Added";
}
else{
   echo "Failed to add record";
}
// if($up){
//    echo "Image Uploaded Successfully";
// }
// else{
//    echo "Failed to upload";
// }
}


?>

<form method="post" enctype="multipart/form-data">
   Title:<input type="text" name="title"><br><br>
   Upload Image:<input type="file" name="IMG">
   <input type="submit" name="submit" value="Upload Image">

</form>