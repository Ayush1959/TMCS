<?php
session_start();
?>
<form method="post">
  <input type="submit" name="dashboard" value="Dashboard">
  <!-- <button id="signup-button" type="submit">Sign Up</button> -->
  <br><br>
  <input type="submit" name="logout" value="Log out">
  <!-- <button id="login-button" type="submit">Log in</button> -->

</form>


<?php
if( isset( $_REQUEST['dashboard'] ))
{
// echo "string";
header('Location:dashboard.php');
exit;
}

if( isset( $_REQUEST['logout'] ))
{
// echo "login";
header('Location:logout.php');
exit;
}

 ?>
