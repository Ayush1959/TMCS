<?php
session_start();
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


     ?>
     <?php
     $_SESSION["name"] = $cookie_name;
     $_SESSION["username"] = $cookie_username;
     $_SESSION["email"] = $cookie_email;
     $_SESSION["number"] = $cookie_number;
     $_SESSION["password"] = $cookie_password;

     echo "session variables are set";
     echo "<br>";
     print_r($_SESSION);
     header('Location:login.php');
     exit;


      ?>
     </body>
</html>
