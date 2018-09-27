<html>
<body>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
X: <input type="text" name="x"><br>
Y: <input type="text" name="y"><br>
Operator: <input type="text" name="operator"><br>
<input type="submit">
</form>

</body>
</html>


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
