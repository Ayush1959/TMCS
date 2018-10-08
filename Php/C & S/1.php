<?php
$cookie_name = "user";
$cookie_value = "Ayush";
setcookie($cookie_name, $cookie_value, time() - (86400 * 1), "/");
 ?>

<html>
  <head>
    </head>
  <body>
    <?php
    if (!isset($_COOKIE[$cookie_name])) {
      echo "cookie named '" .$cookie_name . "' is not set!";
    }
    else {
      echo "cookie named '" .$cookie_name . "' is set!";
      echo "<br>";
      echo "value is :" .$_COOKIE[$cookie_name];
    }

     ?>
  </body>
</html>
