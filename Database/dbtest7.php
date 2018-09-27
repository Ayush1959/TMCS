<?php
$con = mysqli_connect("localhost","root","","first") or die("connection failed");

$query = "select COUNT(Name) FROM tbl_one";

$res = mysqli_query($con,$query);

// echo $res;
// $res1 = 1;
// $res1 = mysqli_result();
$num = mysqli_num_rows($res);
// echo $num;
$a = 1;
while ($a <= $num) {
  $row = mysqli_fetch_array($res);
  echo $row[0];
  echo "<br>";
  // echo $row['M1'];
  // echo "<br>";
  // echo $row['Roll_No'];
  // echo "<br>";
  $a += 1;
}

?>
