<?php
$con = mysqli_connect("localhost","root","","first") or die("connection failed");

$query = "select * FROM tbl_one WHERE Name LIKE 'E%'";

$res = mysqli_query($con,$query);
// echo $res;
$num = mysqli_num_rows($res);
$a = 1;
while ($a <= $num) {
  $row = mysqli_fetch_array($res);
  echo $row['Name'];
  echo "<br>";
  $a += 1;
}

?>
