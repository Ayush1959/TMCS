<?php
$con = mysqli_connect("localhost","root","","first") or die("connection failed");
$name = "Ed";
$rno = 7;
$m1 = 21;
$m2 = 35;
$m3 =42;

$query = "insert into tbl_one(Name,Roll_No,M1,M2,M3)values('$name','$rno','$m1','$m2','$m3')";
$res = mysqli_query($con,$query);
 ?>
