<?php
session_start();
echo "Welcome " . $_SESSION['name']. "<br>";
?>
<a href="adduser.php">Add user</a>
<a href="addnews.php">Add news</a>
<a href="userlist.php">User list</a>
<a href="newslist.php">News list</a>
<a href="logout.php">Logout</a>
