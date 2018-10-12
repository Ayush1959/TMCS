<?php
session_start();
echo "<p><b>Welcome " . $_SESSION['name1']. "</b></p><br>";
?>
<!-- <html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head> -->
<?php
if (("Admin" == $_SESSION["username1"]) & ($_SESSION["password"] == $_SESSION["password1"])) {
  echo "<html>";
  echo "<head>";
  echo '<meta charset="utf-8">';
  echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
  echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">';
  echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>';
  echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>';
  echo "</head>";
  echo "<body>";
  echo '<div class="container">';
  echo '<div class="row">';
  echo '<div class="col-lg-2">';
  echo "<a href='adduser.php'>Add user</a>";
  echo '</div>';
  echo '<div class="col-lg-2">';
  echo '<a href="addnews.php">Add news</a>';
  echo '</div>';
  echo '<div class="col-lg-2">';
  echo '<a href="userlist.php">User list</a>';
  echo '</div>';
  echo '<div class="col-lg-2">';
  echo '<a href="newslist.php">News list</a>';
  echo '</div>';
  echo '<div class="col-lg-2">';
  echo '<a href="index.php">Index</a>';
  echo '</div>';
  echo '<div class="col-lg-2">';
  echo '<a href="logout.php">Logout</a>';
  echo '</div>';
  echo '</div>';
  echo '</div>';
  echo "</body>";
  echo "</html>";
}
else {
  // echo "<a href='adduser.php'>Add user</a>";
  echo "<html>";
  echo "<head>";
  echo '<meta charset="utf-8">';
  echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
  echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">';
  echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>';
  echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>';
  echo "</head>";
  echo "<body>";
  echo '<div class="container">';
  echo '<div class="row">';
  echo '<div class="col-lg-3">';
  echo '<a href="addnews.php">Add news</a>';
  echo '</div>';
  echo '<div class="col-lg-3">';
  echo '<a href="userlist.php">User list</a>';
  echo '</div>';
  echo '<div class="col-lg-2">';
  echo '<a href="index.php">Index</a>';
  echo '</div>';
  echo '<div class="col-lg-3">';
  echo '<a href="newslist.php">News list</a>';
  echo '</div>';
  echo '<div class="col-lg-1">';
  echo '<a href="logout.php">Logout</a>';
  echo '</div>';
  echo '</div>';
  echo '</div>';
}
 ?>
 </html>
