<?php
session_start();
echo "Welcome " . $_SESSION['name1']. "<br>";
// print_r($_SESSION)
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
<?php
$con = mysqli_connect("localhost","root","","db_registration") or die("connection failed");
$query = "select * FROM tbl_news";
$res = mysqli_query($con,$query);
while ($row = mysqli_fetch_array($res)) {
  echo '<div class="container">';
  echo '<div class="row">';
  echo '<div class="col-lg-4">';
  echo "<b>News Heading : </b>  ".$row['Heading'];
  echo '</div>';
  // echo "&nbsp";
  if (("Admin" == $_SESSION["username1"]) & ($_SESSION["password"] == $_SESSION["password1"])) {
    echo '<div class="col-lg-2">';
    echo "<a href='view.php?id=".$row['Id']."'> View &nbsp </a>";
    echo '</div>';
    echo '<div class="col-lg-2">';
    echo "<a href='edit.php?id=".$row['Id']."'> Edit &nbsp </a>";
    echo '</div>';
    echo '<div class="col-lg-2">';
    echo "<a href='delete.php?id=".$row['Id']."'> Delete &nbsp </a>";
    echo '</div>';
    // echo "<br>";
  }
  if (($_SESSION["username1"] == $_SESSION["username2"]) & ("edit" == $_SESSION["type2"])) {
    echo '<div class="col-lg-2">';
    echo "<a href='view.php?id=".$row['Id']."'> View &nbsp </a>";
    echo '</div>';
    echo '<div class="col-lg-2">';
    echo "<a href='edit.php?id=".$row['Id']."'> Edit &nbsp </a>";
    echo '</div>';
  }
  if (($_SESSION["username1"] == $_SESSION["username2"]) & ("cont" == $_SESSION["type2"])) {
    echo '<div class="col-lg-2">';
    echo "<a href='view.php?id=".$row['Id']."'> View &nbsp </a>";
    echo '</div>';
  }
  echo '</div>';
  echo '</div>';
  echo "<br>";
}

 ?>
</body>
</html>
