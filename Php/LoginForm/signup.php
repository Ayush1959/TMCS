<?php
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Form </title>
  </head>
  <body>
    <p><b>Signup Form</b></p>
    <form id="signup_id" name="signup" action="signup-action.php" method="post">
      Name : <input type="text" name="name" required>
      <br>
      User Name: <input type="text" name="username" required>
      <br>
      Email : <input type="text" name="email" required>
      <br>
      Number : <input type="text" name="number">
      <br>
      Password : <input type="password" name="password" required>
      <br><br>
      <input type="submit" name="submit" value="Submit">
      <br><br><br>
    </form>
  </body>
  </html>
