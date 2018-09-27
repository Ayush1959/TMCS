<?php
$y=1;
$w=1;
$z=0;
function PrintNum($x=1)
{
  global $y, $z,$w;
  for ($i=1; $i <= $x ; $i++) {
    if ($i==1) {
      $w = $i;
      echo "$i <br>";
    }
    else {
      $z=$w;
      echo $z.$i;
      echo "<br>";
      $w= $z.$i;
    }
  }
}
PrintNum(20)

 ?>
