<?php
$con = mysqli_connect("localhost","root","","first") or die("connection failed");
// $query = "DELETE FROM tbl_one WHERE Name ='ayush' ";
$query = "DELETE FROM tbl_one";
$res = mysqli_query($con,$query);
?>


<!-- DELETE FROM Customers
WHERE CustomerName='Alfreds Futterkiste'; -->
