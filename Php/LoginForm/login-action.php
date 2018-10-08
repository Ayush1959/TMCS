<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (isset($_POST["username"])) {
    $cookie_username = $_POST["username"];
      }
  if (isset($_POST["password"])) {
    $cookie_password = $_POST["password"];
      }

}

 ?>

<html>
  <body>
    <?php
    // echo $cookie_username;
    // echo "<br>";
    // echo $cookie_password;
    echo "<br>";


     ?>
     <?php
     $_SESSION["username1"] = $cookie_username;
     $_SESSION["password1"] = $cookie_password;

     // echo "session variables are set";
     // echo "<br>";
     // print_r($_SESSION);
      ?>
<?php
if (($_SESSION["username"] == $_SESSION["username1"]) & ($_SESSION["password"] == $_SESSION["password1"])) {
    // echo "Password is correct";
    header('Location:loggedin.php');
    exit;
  }
else {
  echo "incorrect credentials";
  echo "<br><br>";
  echo "Click go back to visit Main page";
  echo "<form method='post'>
    <input type='submit' name='back' value='Go Back'>
    </form>";
    if( isset( $_REQUEST['back'] ))
    {
    // echo "string";
    header('Location:form.php');
    exit;
    }
}

 ?>


     </body>
</html>
