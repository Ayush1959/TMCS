<?php
session_start();
echo "Welcome " . $_SESSION['name']. "<br>";
?>
<a href="dashboard.php">Dashboard</a>
<!-- <a href="adduser.php">Add user</a>
<a href="userlist.php">User list</a>
<a href="newslist.php">News list</a> -->
<a href="logout.php">Logout</a>
<br><br>

<!DOCTYPE html>
<html>
  <head>
    <title>Form </title>
  </head>
  <body>
    <p><b>Add News</b></p>
    <form id="signup_id" name="signup" action="addnews-action.php" method="post" enctype="multipart/form-data">
      Heading : <input type="text" name="name" required>
      <br>
      Description : <input type="text" name="description" required>
      <br>
      Select image to upload:
      <input type="file" name="fileToUpload" id="fileToUpload">
      <br>
      <input type="submit" name="submit" value="Submit">
      <br><br><br>
    </form>
  </body>
  </html>
