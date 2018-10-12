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
        <div class="col-lg-2">
          <a href="dashboard.php">Dashboard</a>
        </div>
        <div class="col-lg-2">
          <a href="userlist.php">User list</a>
        </div>
        <div class="col-lg-2">
          <a href="addnews.php">Add news</a>
        </div>
        <div class="col-lg-4">
          <a href="newslist.php">News list</a>
        </div>
        <div class="col-lg-2">
          <a href="logout.php">Logout</a>
        </div>
      </div>
    </div>
    <h2>User Added</h2>
  </body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (isset($_POST["name"])) {
    $cookie_name = $_POST["name"];
      }
  if (isset($_POST["username"])) {
    $cookie_username = $_POST["username"];
    }
  if (isset($_POST["email"])) {
    $cookie_email = $_POST["email"];
  }
  if (isset($_POST["number"])) {
    $cookie_number = $_POST["number"];
  }
  if (isset($_POST["password"])) {
    $cookie_password1 = $_POST["password"];
    $cookie_password = md5($cookie_password1);
      }
  if (isset($_POST['dd1'])) {
    $cookie_type = $_POST["dd1"];
  }

}

 ?>
     <?php
     $con = mysqli_connect("localhost","root","","db_registration") or die("connection failed");
     $query = "insert into tbl_user(Name,Username,Email,Number,Password,Type)values('$cookie_name','$cookie_username','$cookie_email','$cookie_number','$cookie_password','$cookie_type')";
     $res = mysqli_query($con,$query);



      ?>
