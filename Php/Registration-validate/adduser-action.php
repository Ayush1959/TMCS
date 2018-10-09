<?php
session_start();
echo "Welcome " . $_SESSION['name']. "<br>";
?>
<a href="dashboard.php">Dashboard</a>
<a href="addnews.php">Add news</a>
<a href="userlist.php">User list</a>
<a href="newslist.php">News list</a>
<a href="logout.php">Logout</a>
<br><br>
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
    $cookie_password = $_POST["password"];
      }
  if (isset($_POST['dd1'])) {
    $cookie_type = $_POST["dd1"];
  }

}

 ?>

<html>
  <body>
    <?php
    echo $cookie_name;
    echo "<br>";
    echo $cookie_username;
    echo "<br>";
    echo $cookie_email;
    echo "<br>";
    echo $cookie_number;
    echo "<br>";
    echo $cookie_password;
    echo "<br>";
    echo $cookie_type;


     ?>
     <?php
     $con = mysqli_connect("localhost","root","","db_registration") or die("connection failed");
     $query = "insert into tbl_user(Name,Username,Email,Number,Password,Type)values('$cookie_name','$cookie_username','$cookie_email','$cookie_number','$cookie_password','$cookie_type')";
     $res = mysqli_query($con,$query);



      ?>
     </body>
</html>
