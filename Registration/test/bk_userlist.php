<?php
session_start();
echo "Welcome " . $_SESSION['name1']. "<br>";
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-lg-10">
          <a href="dashboard.php">Dashboard</a>
        </div>
        <div class="col-lg-2">
          <a href="logout.php">Logout</a>
        </div>
      </div>
    </div>
    <br><br>
  </body>
</html>
<?php
$con = mysqli_connect("localhost","root","","db_registration") or die("connection failed");
$query = "select * FROM tbl_user";
$res = mysqli_query($con,$query);
while ($row = mysqli_fetch_array($res)) {
  echo "<ul>";
  echo "<li><b>".$row['Name']. "</b></li>";
  echo "</ul>";
  // echo "</li>";
}
 ?>
