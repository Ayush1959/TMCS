<?php
session_start();
echo "Welcome " . $_SESSION['name']. "<br>";
print_r($_SESSION)
?>
<a href="dashboard.php">Dashboard</a>
<!-- <a href="adduser.php">Add user</a>
<a href="addnews.php">Add news</a>
<a href="userlist.php">User list</a> -->
<a href="logout.php">Logout</a>
<br><br>

<?php
$con = mysqli_connect("localhost","root","","db_registration") or die("connection failed");
$query = "select * FROM tbl_news";
$res = mysqli_query($con,$query);
while ($row = mysqli_fetch_array($res)) {
  echo "News Heading : ".$row['Heading'];
  echo "&nbsp";
  if (("Admin" == $_SESSION["username1"]) & (12345 == $_SESSION["password1"])) {
    echo "<a href='test_view.php?id=".$row['Id']."'> View &nbsp </a>";
    echo "<a href='edit.php?id=".$row['Id']."'> Edit &nbsp </a>";
    echo "<a href='delete.php?id=".$row['Id']."'> Delete &nbsp </a>";
    echo "<br>";
  }
  if (($_SESSION["username1"] == $_SESSION["username2"]) & ("edit" == $_SESSION["type2"])) {
    echo "<a href='test_view.php?id=".$row['Id']."'> View &nbsp </a>";
    echo "<a href='edit.php?id=".$row['Id']."'> Edit &nbsp </a>";
  }
  if (($_SESSION["username1"] == $_SESSION["username2"]) & ("cont" == $_SESSION["type2"])) {
    echo "<a href='test_view.php?id=".$row['Id']."'> View &nbsp </a>";
  }
  // echo "<a href='test_view.php?id=".$row['Id']."'> View &nbsp </a>";
  // echo "<a href='edit.php?id=".$row['Id']."'> Edit &nbsp </a>";
  // echo "<a href='delete.php?id=".$row['Id']."'> Delete &nbsp </a>";
  echo "<br>";

}



 ?>
