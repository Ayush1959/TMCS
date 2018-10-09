<?php
session_start();
echo "Welcome " . $_SESSION['name']. "<br>";
?>
<a href="dashboard.php">Dashboard</a>
<!-- <a href="adduser.php">Add user</a>
<a href="addnews.php">Add news</a>
<a href="newslist.php">News list</a> -->
<a href="logout.php">Logout</a>
<br><br>


<?php
$con = mysqli_connect("localhost","root","","db_registration") or die("connection failed");
$query = "select * FROM tbl_user";
$res = mysqli_query($con,$query);
while ($row = mysqli_fetch_array($res)) {
  echo "Name : ".$row['Name']. "<br>";

}



 ?>
