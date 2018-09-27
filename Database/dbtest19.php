<?php
$con = mysqli_connect("localhost","root","","first") or die("connection failed");

$query = "SELECT Name FROM tbl_two UNION SELECT Name FROM tbl_one ORDER BY Name";

$res = mysqli_query($con,$query);
// echo $res;
$a=0;
while ($a <= 10) {
  $row = mysqli_fetch_array($res);
  //
  echo $row['Name'];
  // echo $row['Mark'];
  echo "<br>";
  $a +=1;
  // code...
}

?>



<!-- SELECT Orders.OrderID, Customers.CustomerName, Orders.OrderDate
FROM Orders
INNER JOIN Customers ON Orders.CustomerID=Customers.CustomerID; -->
