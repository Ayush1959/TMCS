<?php
$x=5;
$y=3;
function mytest()
{
  global $x,$y;
  $z=$x+$y;
  echo "z is $z";
  echo "<br>";
  echo "y inside fn is $y";
  $y+=1;
}
mytest();
echo "<br>";
echo "y is $y";
echo "<br>";
// echo "$z";
 ?>
