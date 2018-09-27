<?php
$y=1;
$x=0;
$v=0;
function Fibanocci($z=1){
  global $x, $y, $v;
  echo "$x <br>";
  echo "$y <br>";
  for ($w=2; $w <= $z ; $w++) {
    $v= $x+$y;
    echo "$v <br>";
    $x= $y;
    $y = $v;

  }
}
Fibanocci(5)

 ?>
