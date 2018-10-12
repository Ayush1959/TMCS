<?php
session_start();
?>
<?php
$con = mysqli_connect("localhost","root","","db_registration") or die("connection failed");
?>
<?php

?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
// if(isset($_POST['update']))
{
  $head = $_POST['form-heading'];
  $descr = $_POST['form-description'];
  $target_dir = "uploads/";
  // $image_path = $_POST['fileToUpload'];
  // echo $image_path;
  $path_parts = pathinfo($_FILES["fileToUpload"]["name"]);
  echo "hey <br>";
  print_r($_FILES['fileToUpload']);
  echo "<br>";
  // print_r($_POST['fileToUpload']);
  echo $_POST['fileToUpload'];
  echo "<br>";
  print_r($path_parts);
  // echo $path_parts;
  echo "<br> hi <br>";
  // if ($path_parts == "") {
  //   $path_parts = $_POST['fileToUpload'];
  // }
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
  if ($uploadOk == 0) {
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    echo "File Uploaded";
    echo "<br>";
    echo '<a href="dashboard.php">Dashboard</a>';

  }
  $id = $_POST['id'];
  $query1 = "UPDATE tbl_news SET Heading='$head',Description='$descr',ImagePath='$image_path' WHERE id=$id";
  $res = mysqli_query($con,$query1);
  // header("Location: newslist.php");
}
?>
