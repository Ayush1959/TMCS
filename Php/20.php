<?php
$y=1;
$w=1;
$z=0;
$s=0;
function PrintNum($x=1)
{
  global $y, $z,$w;
  if ($y == 1) {
    echo "$y <br>";
  }

  while ($y < $x) {
    $z = $w ;
    $y += 1;
    echo $z . $y ;
    // echo "pr" ,"$y" ;
    echo "<br>";
    if ($y<$x) {
      $s = $z.$y;
      $y+=1;
      echo $s.$y;
      $w = $s.$y;

      echo "<br>";
    }
    // else {
    //   break;
    // }

    // code...
  }
}
PrintNum(9)

 ?>
