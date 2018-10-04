<?php
$name = "1";
$nameErr = "";
$name =$_POST['name'];
if(isset($name) && $name !='' && $name !='undefined'){


  echo "success";
}else{
  echo  "Name is Required";
}
exit;

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
// echo $name;
// echo "\r\n";
// echo $nameErr;
// echo $nameErr;
