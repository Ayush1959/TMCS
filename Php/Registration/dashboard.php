<?php
session_start();
echo "<p><b>Welcome " . $_SESSION['name1']. "</b></p><br>";
?>
<?php
if (("Admin" == $_SESSION["username1"]) & ($_SESSION["password"] == $_SESSION["password1"])) {
  header("Location: pages/admin.php");
}
else {
  header("Location: pages/sidebar.php");
}
 ?>
 </html>
