<?php
$name = $email= "";
$nameErr = $emailErr= "";
// $name =$_POST['name'];
// if(isset($name) && $name !='' && $name !='undefined'){
//
//
//   echo "success";
// }else{
//   echo  "Name is Required";
// }
// exit;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is Required";
  }
  else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "only letters and white spaces allowed";
    }
  }
  if (empty($_POST["email"])) {
    $emailErr = "Email is Required";
    $z += 1;
  }
  else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      $z += 1;
    }
  }
}
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//   $name = $_POST["name"];
// }

// echo $_POST["name"];
echo $name;
echo "\r\n";
echo $nameErr;
echo $email;
echo "\r\n";
echo $emailErr;
// echo $nameErr;
