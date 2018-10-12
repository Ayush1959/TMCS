<?php
session_start();
// echo "<p><b>Welcome " . $_SESSION['name1']. "</b></p><br>";
?>

<?php
if (("Admin" == $_SESSION["username1"]) & ($_SESSION["password"] == $_SESSION["password1"])) {
   include 'includes/header.php';
   include 'includes/sidebar-admin.php';
   include 'includes/content.php';
   include 'includes/footer.php';
}
else {
   include 'includes/header.php';
   include 'includes/sidebar-user.php';
   include 'includes/content.php';
   include 'includes/footer.php';
  }
 ?>
