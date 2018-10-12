<?php
$con = mysqli_connect("localhost","root","","db_registration") or die("connection failed");
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
// if(isset($_POST['update']))
{
  $head = $_POST['form-heading'];
  $descr = $_POST['form-description'];
  $id = $_POST['id'];
  $query1 = "UPDATE tbl_news SET Heading='$head',Description='$descr' WHERE id=$id";
  $res = mysqli_query($con,$query1);
  header("Location: newslist.php");
}
