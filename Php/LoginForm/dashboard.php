<?php
session_start();
echo "Welcome " . $_SESSION['name'];
?>
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
<form method="post">
  <input type="submit" name="home" value="Home">
  <!-- <button id="signup-button" type="submit">Sign Up</button> -->
  <br><br>
  <input type="submit" name="logout" value="Log out">
  <!-- <button id="login-button" type="submit">Log in</button> -->

</form>
<a href="logout.php">Visit W3Schools</a>


<?php
if( isset( $_REQUEST['home'] ))
{
// echo "string";
header('Location:loggedin.php');
exit;
}

if( isset( $_REQUEST['logout'] ))
{
// echo "login";
header('Location:logout.php');
exit;
}
 ?>

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
                 <th>Continent</th>
                 <th>Region</th>
                 <th>Population</th>
             </tr>
             <?php
                while ($row = mysqli_fetch_array($res)) {
                    echo "<tr>";
                    echo "<td>".$row['Code']."</td>";
                    echo "<td>".$row['Name']."</td>";
                    echo "<td>".$row['Continent']."</td>";
                    echo "<td>".$row['Region']."</td>";
                    echo "<td>".$row['Population']."</td>";
                    echo "</tr>";
                }

             ?>
 </table>
