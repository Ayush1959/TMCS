<?php
session_start();
echo "Welcome " . $_SESSION['name']. "<br>";
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
  echo '<a href=\"edit1.php?id=$res[id]\">Edit</a> |
   <a href="delete.php?id=$res[id]" onClick=\"return confirm
   ("Are you sure you want to delete?")\">Delete</a>';
   echo "<br>";

}



 ?>

 <!-- <a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a> -->


 <!-- echo '<a href="delete.php?id= <?php echo $row["id"]; ?>Delete</a>'; -->
 <!-- echo "<a href=\"edit.php?id=".mysql_result($result,$j,'id')."\"><strong>EDIT</strong>"; -->

 <!-- echo "<a href=\"delete.php?id=".mysql_result($res,'id')."\"><strong>delete</strong>"; -->
