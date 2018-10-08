<html>
<body>
  <style>
  table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 90%;
  }
  td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 10px;
    color: #000000;
  }
  </style>
<?php
$con = mysqli_connect("localhost","root","","world") or die("connection failed");
$query = "select * FROM country";
$res = mysqli_query($con,$query);
// echo "<br><br>";
// print_r($res);
?>
<table>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Region</th>
            </tr>
            <?php
               while ($row = mysqli_fetch_array($res)) {
                   echo "<tr>";
                   echo "<td>".$row['Code']."</td>";
                   echo "<td>".$row['Name']."</td>";
                   echo "<td>".$row['Region']."</td>";
                   echo "</tr>";
               }

            ?>
</table>
</body>
</html>

<!-- $res = mysqli_query($con,$query);

$row = mysqli_fetch_array($res);

echo $row['Name'];
echo $row['Code'];
?> -->
