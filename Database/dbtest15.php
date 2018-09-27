<?php
$con = mysqli_connect("localhost","root","","first") or die("connection failed");

$query = "SELECT tbl_one.Name, tbl_two.Mark FROM tbl_two INNER JOIN tbl_one ON tbl_two.Roll_No=tbl_one.Roll_No";

$res = mysqli_query($con,$query);
// echo $res;
$a=0;
while ($a <= 15) {
  $row = mysqli_fetch_array($res);
  //
  echo $row['Name'];
  echo $row['Mark'];
  echo "<br>";
  $a +=1;
  // code...
}

?>



<!-- SELECT Orders.OrderID, Customers.CustomerName, Orders.OrderDate
FROM Orders
INNER JOIN Customers ON Orders.CustomerID=Customers.CustomerID; -->
