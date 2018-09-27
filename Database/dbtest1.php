<?php
$con = mysqli_connect("localhost","root","","first") or die("connection failed");

$query = "select Name,M1 FROM tbl_one";

$res = mysqli_query($con,$query);


$a = 1;
while ($a <= 2) {
  $row = mysqli_fetch_array($res);
  echo $row['Name'];
  echo $row['M1'];
  echo "<br>";
  $a += 1;
}

?>
