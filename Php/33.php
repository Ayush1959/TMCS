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
echo "<br>";
echo "$gender";
echo "<br><br>";
echo "<img src='$target_file' height='150' width='150' /> ";
?>

</body>
</html>
