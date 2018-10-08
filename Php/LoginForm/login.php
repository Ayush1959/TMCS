<?php
session_start();
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Form </title>
  </head>
  <body>
    <p><b>Login Form</b></p>
    <form id="login_id" name="login" action="login-action.php" method="post">
      User Name : <input type="text" name="username" required>
      <br>
      Password : <input type="password" name="password" required>
      <br><br>
      <input type="submit" name="submit" value="Submit">
    </form>
  </body>
</html>
