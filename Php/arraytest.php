<?php
$n1="ayu";
$n2="anju";
$n3="mahi";

$e1=21;
$e2=22;
$e3=23;
$e4=24;
$e5=25;

$e = array($n1 => $e3 , $n2 => $e2 , $n1 => $e3 );
print_r($e);
arsort($e);
echo "<br>";
foreach($e as $x => $x_value) {
    echo "Name=" . $x . ", Mark=" . $x_value;
    echo "<br>";
}
print_r($e);
echo "<br>";
$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
print_r($age);
foreach($age as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}

// foreach($e as $x => $x_value) {
//     echo "mark=" . $x . ", Names=" . $x_value;
//     echo "<br>";
// }




 ?>
