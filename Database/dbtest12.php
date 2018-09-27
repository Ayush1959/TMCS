<?php
$con = mysqli_connect("localhost","root","","first") or die("connection failed");

$query = "select Name AS Ne, Roll_No AS Rn FROM tbl_one WHERE M2=35 AND Roll_No BETWEEN 4 AND 14";

$res = mysqli_query($con,$query);
// echo $res;
$num = mysqli_num_rows($res);
$a = 1;
while ($a <= $num) {
  $row = mysqli_fetch_array($res);
  echo $row['Ne'];
  echo "<br>";
  $a += 1;
}

?>
