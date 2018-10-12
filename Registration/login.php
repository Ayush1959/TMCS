<?php
session_start();
// print_r($_SESSION);
$_SESSION["name"] = "Administrator";
$_SESSION["username"] = "Admin";
$_SESSION["password"] = "827ccb0eea8a706c4c34a16891f84e7b";
$_SESSION["type"] = "admin";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Form </title>
  </head>
  <body>
    <div class="container">
    <p><b>Login Form</b></p>
    <form id="login_id" name="login-form" action="login-action.php" method="post">
      <div class="form-group">
      <label for="usr">User Name:</label>
      <input type="text" id="usr" class="form-control" placeholder="UserName" name="username" required>
    </div>
      <!-- <br> -->
      <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Password" name="password" required>
    </div>
      <!-- <br><br> -->
      <button type="submit" class="btn btn-primary">Submit</button>
      <!-- <input type="submit" name="submit" value="Submit"> -->
    </form>
  </div>
  </body>
</html>
