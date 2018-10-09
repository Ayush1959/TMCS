<?php
session_start();
echo "Welcome " . $_SESSION['name']. "<br>";
?>
<a href="dashboard.php">Dashboard</a>
<a href="addnews.php">Add news</a>
<a href="userlist.php">User list</a>
<a href="newslist.php">News list</a>
<a href="logout.php">Logout</a>
<br><br>

<!DOCTYPE html>
<html>
  <head>
    <title>Form </title>
  </head>
  <body>
    <p><b>Signup Form</b></p>
    <form id="signup_id" name="signup" action="adduser-action.php" method="post">
      Name : <input type="text" name="name" required>
      <br>
      User Name : <input type="text" name="username" required>
      <br>
      Email : <input type="text" name="email" required>
      <br>
      Number : <input type="text" name="number">
      <br>
      Password : <input type="password" name="password" required>
      <br><br>
      User Type : <select name="dd1" id="dd1" class="form-control" required>
        <option value="">Select Type</option>
        <option value="edit">Editor</option>
        <option value="cont">Contributor</option>
        </select>
      <br>
      <input type="submit" name="submit" value="Submit">
      <br><br><br>
    </form>
  </body>
  </html>
