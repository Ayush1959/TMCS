<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (isset($_POST["name"])) {
    $cookie_heading = $_POST["name"];
      }
  if (isset($_POST["description"])) {
    $cookie_description = $_POST["description"];
    }
}

 ?>


<?php
$target_dir = "uploads/";
$path_parts = pathinfo($_FILES["fileToUpload"]["name"]);
$image_path = $path_parts['filename'].'_'.time().'.'.$path_parts['extension'];
$target_file = $target_dir . basename($image_path);
$uploadOk = 0;
if (($_FILES["fileToUpload"]["type"] == "image/jpg")
|| ($_FILES["fileToUpload"]["type"] == "image/png")
|| ($_FILES["fileToUpload"]["type"] == "image/jpeg") ){
  echo "Considering file size <br>";
 }
else {
   echo "Only jpg & png are allowed <br>";
   $uploadOk += 1;
 }
// if (($_FILES["fileToUpload"]["size"] <= "500000")) {
  // $x = @getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  // echo "$x <br>";
  // $width = $x[0];
  // echo "width =" .$width. "<br>";
  // $height = $x[1];
  // echo "height =" . $height . "<br>";

  // }
// else {
    // echo "File size limit exeeded";
    // $uploadOk += 1;
  // }
// if ($width == 350 && $height == 200) {
  // echo "Dimensions are okay <br>";
// }
// else {
  // echo "Width=350 and Height=200 is needed";
  // $uploadOk += 1;
// }

if ($uploadOk == 0) {
  move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
  echo "File Uploaded";
  echo "<br>";
  echo '<a href="dashboard.php">Dashboard</a>';

}

?>


<?php

// $path_parts = pathinfo($_FILES["fileToUpload"]["name"]);
// $image_path = $path_parts['filename'].'_'.time().'.'.$path_parts['extension'];
// // $imagename=$_FILES["fileToUpload"]["name"].time();
// echo "<br><br><br><br>";
// // echo $imagename;
echo $image_path;
//
// $imagetmp=addslashes (file_get_contents($target_dir . basename($_FILES["fileToUpload"]["name"])));
// // echo "<br><br><br><br>";
// // echo $imagetmp;
$con = mysqli_connect("localhost","root","","db_registration") or die("connection failed");
// // $query = "insert into tbl_user(Name,Username,Email,Number,Password,Type)values('$cookie_name','$cookie_username','$cookie_email','$cookie_number','$cookie_password','$cookie_type')";
$insert_image="INSERT INTO tbl_news(Heading,Description,ImagePath) VALUES('$cookie_heading','$cookie_description','$image_path')";
$res = mysqli_query($con,$insert_image);
// // mysql_query($insert_image);

?>
