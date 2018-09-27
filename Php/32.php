<html>
<body>

<?php
$name = $email = $number = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $number = test_input($_POST["number"]);
  }

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

 ?>

 <form method="post" enctype="multipart/form-data">
   Name : <input type="text" name="name">
   <br>
   E-Mail : <input type="text" name="email">
   <br>
   Number : <input type="text" name="number">
   <br><br>
   Select image to upload:
   <input type="file" name="fileToUpload" id="fileToUpload">
   <!-- <input type="submit" value="Upload Image" name="submit"> -->
   <input type="submit" name="submit" value="Upload Image and Submit">
</form>

<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
}

echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $number;
echo "<br><br>";
echo "<img src='$target_file' height='150' width='150' /> ";
?>

</body>
</html>
