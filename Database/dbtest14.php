<?php
$con = mysqli_connect("localhost","root","","first") or die("connection failed");
$name = "Litchi";
$rno = 18;
$m1 = 21;
$m2 = 35;
$m3 =42;

$query = "insert into tbl_two(Name,Roll_No,Id,M2,Mark)values('$name','$rno','$m1','$m2','$m3')";
$res = mysqli_query($con,$query);
 ?>
