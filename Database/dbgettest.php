<?php
$con = mysqli_connect("localhost","root","","first") or die("connection failed");

$query = "select * FROM tbl_one";

$res = mysqli_query($con,$query);

$row = mysqli_fetch_array($res);

echo $row['Name'];
echo $row['Roll_No'];
?>
