<?php
$x = $_POST["x"];
$y = $_POST["y"];
$operator = $_POST["operator"];
$z=0;
// $x = 1;
// $y = 2;
// $operator= "+" ;
switch ($operator) {
  case '+':
  $z= $x + $y;
  echo "$z";
  break;
  case '-':
  $z= $x - $y;
  echo "$z";
  break;
  case '*':
  $z= $x * $y;
  echo "$z";
  break;
  case '/':
  $z= $x / $y;
  echo "$z";
  break;

  default:
    echo "please check your entries";
    break;
}

 ?>
