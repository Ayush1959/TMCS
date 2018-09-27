<?php
$x= 0;
$y= 1;
$z= 0;
function Fibanocci($w=5)
{
  global $x, $n, $y, $z;
  echo "$x <br>";
  echo "$y <br>";
  while ($w - $y >=$x) {
    $z = $x + $y ;
    echo "$z <br>";
    $x = $y;
    $y = $z;
  }
}
Fibanocci(20)
 ?>
