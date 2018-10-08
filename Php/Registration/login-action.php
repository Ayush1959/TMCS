<?php
session_start();
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
 $con = mysqli_connect("localhost","root","","db_registration") or die("connection failed");
 $query = "select * FROM tbl_user";
 $res = mysqli_query($con,$query);
 ?>
<html>
  <body>
     <?php
     $_SESSION["username1"] = $cookie_username;
     $_SESSION["password1"] = $cookie_password;
      ?>
<?php
while ($row = mysqli_fetch_array($res)) {
  $_SESSION["username2"] = $row['Username'];
  $_SESSION["password2"] = $row['Password'];
  if (($_SESSION["username2"] == $_SESSION["username1"]) & ($_SESSION["password2"] == $_SESSION["password1"])) {
    header('Location:dashboard.php');
    exit;
  }
}
if (("Admin" == $_SESSION["username1"]) & (12345 == $_SESSION["password1"])) {
    header('Location:dashboard.php');
    exit;
  }
else {
  echo "incorrect credentials";
  echo "<br><br>";
  echo "Click go back to visit Main page";
  echo "<form method='post'>
    <input type='submit' name='back' value='Go Back'>
    </form>";
    if( isset( $_REQUEST['back'] ))
    {
    // echo "string";
    header('Location:login.php');
    exit;
    }
}
 ?>
</body>
</html>
