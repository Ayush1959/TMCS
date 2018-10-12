<?php
session_start();
echo "Welcome " . $_SESSION['name1']. "<br>";
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
      <div class="row">
        <div class="col-lg-2">
          <a href="dashboard.php">Dashboard</a>
        </div>
        <div class="col-lg-2">
          <a href="userlist.php">User list</a>
        </div>
        <div class="col-lg-2">
          <a href="addnews.php">Add news</a>
        </div>
        <div class="col-lg-4">
          <a href="newslist.php">News list</a>
        </div>
        <div class="col-lg-2">
          <a href="logout.php">Logout</a>
        </div>
      </div>
    </div>
    <br>
    <div class="container">
    <p><b>Signup Form</b></p><br>
    <form id="signup_id" name="signup" action="adduser-action.php" method="post">
      <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>
      <!-- <br> -->
      <div class="form-group">
      <label for="usr">User Name:</label>
      <input type="text" class="form-control" id="usr" name="username" required>
    </div>
      <!-- <br> -->
      <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" class="form-control" id="email" name="email" required>
    </div>
      <!-- <br> -->
      <div class="form-group">
      <label for="nbr">Number:</label>
      <input type="text" id="nbr" class="form-control" name="number">
    </div>
      <!-- <br> -->
      <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" name="password" required>
    </div>
      <!-- <br><br> -->
      <div class="form-group">
      <label for="dd1">User Type:</label>
      <select name="dd1" id="dd1" class="form-control" required>
        <option value="">Select Type</option>
        <option value="edit">Editor</option>
        <option value="cont">Contributor</option>
        </select>
      </div>
      <!-- <br> -->
      <button type="submit" class="btn btn-default">Submit</button>
      <!-- <input type="submit" name="submit" value="Submit"> -->
      <!-- <br><br><br> -->
    </form>
  </div>
  </body>
  </html>
