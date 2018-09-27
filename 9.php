<?php
$x=5;
$y=4;
function FunctionName($value='')
{
  global $y;
  $GLOBALS['y'] = $GLOBALS['x'] +$GLOBALS['y'];
  echo "$y inside";
  // code...
}
FunctionName();
echo "<br>";
echo "$y outside";
 ?>
