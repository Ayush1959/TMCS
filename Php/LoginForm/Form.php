<?php
session_start();
$_SESSION["name"] = "Ayush";
$_SESSION["username"] = "Ayu";
$_SESSION["password"] = "2580";
?>



<form method="post">
  <input type="submit" name="signup" value="Sign Up">
  <!-- <button id="signup-button" type="submit">Sign Up</button> -->
  <br><br>
  <input type="submit" name="login" value="Log in">
  <!-- <button id="login-button" type="submit">Log in</button> -->

</form>


<?php
if( isset( $_REQUEST['signup'] ))
{
// echo "string";
header('Location:signup.php');
exit;
}

if( isset( $_REQUEST['login'] ))
{
// echo "login";
header('Location:login.php');
exit;
}

 ?>
