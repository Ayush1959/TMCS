<?php
$con = mysqli_connect("localhost","root","","first") or die("connection failed");

$query = "INSERT INTO tbl_two ('Name') SELECT Name FROM tbl_one";

$res = mysqli_query($con,$query);
print_r($res)
// echo $res;
// $row = mysqli_fetch_array($res);
//
// echo $row['Name'];
// echo $row['Roll_No'];
// echo tbl_one.Name;
?>
