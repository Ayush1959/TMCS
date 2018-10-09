<?php
session_start();
$cookie_username = $cookie_password = "";
$usernameErr = $passwordErr = "";
$con = mysqli_connect("localhost","root","","db_registration") or die("connection failed");
$query = "select * FROM tbl_user";
$res = mysqli_query($con,$query);
$errorarray =array();
$z = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (isset($_POST["username"])) {
    $cookie_username = $_POST["username"];
      }
  if (isset($_POST["password"])) {
    $cookie_password = $_POST["password"];
    }
}
 ?>
     <?php
     $_SESSION["username1"] = $cookie_username;
     $_SESSION["password1"] = $cookie_password;
      ?>
<?php
while ($row = mysqli_fetch_array($res)) {
  $_SESSION["username2"] = $row['Username'];
  $_SESSION["password2"] = $row['Password'];
  $_SESSION["type2"] = $row['Type'];
  if (($_SESSION["username2"] == $_SESSION["username1"]) & ($_SESSION["password2"] == $_SESSION["password1"])) {
    echo "user";
    // header('Location:dashboard.php');
    // exit;
  }
  if (("Admin" == $_SESSION["username1"]) & (12345 == $_SESSION["password1"])) {
    echo "admin";
    // header('Location:dashboard.php');
    // exit;
  }
  else {
    echo "incorrect credentials";
  }
}
?>
