<?php
session_start();
print_r($_SESSION);
$_SESSION["name"] = "Administrator";
$_SESSION["username"] = "Admin";
$_SESSION["password"] = "12345";
$_SESSION["type"] = "admin";
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Form </title>
    <script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js">
    </script>
    <script>var jq = $.noConflict();</script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js">
    </script>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="login-post.js">
    </script>
  </head>
  <body>
    <p><b>Login Form</b></p>
    <form id="login_id" name="login-form">
      User Name : <input type="text" name="username" id="username_id">
      <br>
      Password : <input type="password" name="password" id="password_id">
      <br><br>
      <button id="bb" type="submit" class="viewmore float-right border-0" >
        Send <span id="loader" class="loader float-right"></span>
      </button>
      <!-- <input type="submit" name="submit" value="Submit"> -->
    </form>
  </body>
</html>
