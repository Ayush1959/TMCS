<?php
session_start();
// echo "Welcome " . $_SESSION['name']. "<br>";
?>
<?php
if (("Admin" == $_SESSION["username1"]) & (12345 == $_SESSION["password1"])) {
  echo "<a href='adduser.php'>Add user</a>";
  echo '<a href="addnews.php">Add news</a>';
  echo '<a href="userlist.php">User list</a>';
  echo '<a href="newslist.php">News list</a>';
  echo '<a href="logout.php">Logout</a>';
}
else {
  // echo "<a href='adduser.php'>Add user</a>";
  echo '<a href="addnews.php">Add news</a>';
  echo '<a href="userlist.php">User list</a>';
  echo '<a href="newslist.php">News list</a>';
  echo '<a href="logout.php">Logout</a>';
}
 ?>
