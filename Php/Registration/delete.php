<?php
//
// //including the database connection file
// // include("config.php");
// $con = mysqli_connect("localhost","root","","db_registration") or die("connection failed");
//
// //getting id of the data from url
// $id = $_GET['id'];
// echo $id;
//
// //deleting the row from table
// $result = mysqli_query($mysqli, "DELETE FROM tbl_news WHERE id=$id");
//
// //redirecting to the display page (index.php in our case)
// // header("Location:newslist.php");
//

?>
<?php
$con = mysqli_connect("localhost","root","","db_registration") or die("connection failed");
$id=$_REQUEST['id'];
echo $id;
echo "<br>";
$id=$_GET['id'];
echo $id;
// $query = "DELETE FROM tbl_news WHERE id=$id";
// $result = mysqli_query($con,$query);

// header("Location: newslist.php");
?>
