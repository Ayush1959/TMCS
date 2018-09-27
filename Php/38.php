<html>
<body>
<style>
.error {
  color:  #FF0000;
}
</style>

<?php
$name = $email = $number = $gender = "";
$nameErr = $emailErr = $numberErr = $genderErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["name"])) {
    $nameErr = "Name is Required";
  }
  else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "only letters and white spaces allowed";
      // code...
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is Required";
  }
  else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  // $name = test_input($_POST["name"]);
  // $email = test_input($_POST["email"]);
  $number = test_input($_POST["number"]);
  if (!is_numeric($number)) {
    $numberErr = "Only Numbers are allowed";
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is Required";
  }
  else {
    $gender = test_input($_POST["gender"]);
  }
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
   <span class="error">* <?php echo $nameErr;?></span>
   <br>
   E-Mail : <input type="text" name="email">
   <span class="error">* <?php echo $emailErr;?></span>
   <br>
   Number : <input type="text" name="number">
   <span class="error">* <?php echo $numberErr;?></span>
   <br>
   Gender:
   <input type="radio" name="gender" value="Female">Female
   <input type="radio" name="gender" value="Male">Male
   <input type="radio" name="gender" value="other">Other
   <span class="error">* <?php echo $genderErr;?></span>
   <br><br>
   Select image to upload:
   <input type="file" name="fileToUpload" id="fileToUpload">
   <!-- <input type="submit" value="Upload Image" name="submit"> -->
   <input type="submit" name="submit" value="Upload Image and Submit">
</form>

<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 0;

if (isset($_POST["upload"])) {
  $x = @getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  $width = $x[0];
  $height = $x[1];
  if (($_FILES["fileToUpload"]["type"] != "image/jpg")
  || ($_FILES["fileToUpload"]["type"] != "image/png")
  || ($_FILES["fileToUpload"]["type"] != "image/jpeg") ){
    $h = "Only jpg & png are allowed";
    echo "Only jpg & png are allowed <br>";
  }
  elseif (($_FILES["fileToUpload"]["size"] > "500000")) {
    echo "File size limit exeeded";
  }
  elseif ($width != 350) {
    echo "Width=350 is needed";
  }
  elseif ($height != 200) {
    echo "Height=200 is needed";
  }
  else {
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    echo "File Uploaded";
    echo "$h";
  }


}

// if (($_FILES["fileToUpload"]["type"] == "image/jpg")
// || ($_FILES["fileToUpload"]["type"] == "image/png")
// || ($_FILES["fileToUpload"]["type"] == "image/jpeg") ){
//   echo "Considering file size <br>";
//  }
// else {
//    echo "Only jpg & png are allowed <br>";
//    $uploadOk += 1;
//  }
// if (($_FILES["fileToUpload"]["size"] <= "500000")) {
//   $x = @getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//   // echo "$x <br>";
//   $width = $x[0];
//   // echo "width =" .$width. "<br>";
//   $height = $x[1];
//   // echo "height =" . $height . "<br>";
//
//   }
// else {
//     echo "File size limit exeeded";
//     $uploadOk += 1;
//   }
// if ($width == 350 && $height == 200) {
//   echo "Dimensions are okay <br>";
// }
// else {
//   echo "Width=350 and Height=200 is needed";
//   $uploadOk += 1;
// }
//
// if ($uploadOk == 0) {
//   move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
//   echo "File Uploaded";
//
// }

echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $number;
echo "<br>";
// echo "$h <br>";
echo "$gender";
echo "<br><br>";
echo "<img src='$target_file' height='200' width='350' /> ";
?>

</body>
</html>
