<?php
$con = mysqli_connect("localhost","root","","first") or die("connection failed");
$query = "UPDATE tbl_one SET Name='Mahesh',Roll_No=3 WHERE No = 1";
$res = mysqli_query($con,$query);
?>
