<?php
$a = "Ayush";
$b = md5(12345);
echo $b;
echo "<br>";
$c = "ayush";
$d = "Ayush";
$e = md5($c);
$f = md5($d);
echo gettype($b);
echo "<br>";
echo $e;
echo "<br>";
echo $f;
echo "<br>";
if ($b == $f) {
  echo "Success";
}
else {
  echo "Fail";
}

 ?>
