<?php
session_start();
?>
<?php
$con = mysqli_connect("localhost","root","","db_registration") or die("connection failed");
$id=$_GET['id'];
// echo $id;
$query = "DELETE FROM tbl_news WHERE id=$id";
$result = mysqli_query($con,$query);
header("Location: newslist.php");
?>
