<html>
<head>
</head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 90%;
}
td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 10px;
  color: #ddddd;
}
.contaier{
  background-color: #FFFFFF;
}
.tablecontainer{
  height: 420px;
  width:1000px ;
  background-color: #ffffff;
}
</style>






<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (!empty($_POST["college1"])) {
    $college1 = test_input($_POST["college1"]);
  }
  if (!empty($_POST["name1"])) {
    $name1 = test_input($_POST["name1"]);
  }
  if (!empty($_POST["no1"])) {
    $no1 = test_input($_POST["no1"]);
  }
  if (!empty($_POST["english1"])) {
    $english1 = test_input($_POST["english1"]);
  }
  if (!empty($_POST["maths1"])) {
    $maths1 = test_input($_POST["maths1"]);
  }
  if (!empty($_POST["biology1"])) {
    $biology1 = test_input($_POST["biology1"]);
  }
  if (!empty($_POST["physics1"])) {
    $physics1 = test_input($_POST["physics1"]);
  }
  if (!empty($_POST["computer1"])) {
    $computer1 = test_input($_POST["computer1"]);
  }
  if (!empty($_POST["college2"])) {
    $college2 = test_input($_POST["college2"]);
  }
  if (!empty($_POST["name2"])) {
    $name2 = test_input($_POST["name2"]);
  }
  if (!empty($_POST["no2"])) {
    $no2 = test_input($_POST["no2"]);
  }
  if (!empty($_POST["english2"])) {
    $english2 = test_input($_POST["english2"]);
  }
  if (!empty($_POST["maths2"])) {
    $maths2 = test_input($_POST["maths2"]);
  }
  if (!empty($_POST["biology2"])) {
    $biology2 = test_input($_POST["biology2"]);
  }
  if (!empty($_POST["physics2"])) {
    $physics2 = test_input($_POST["physics2"]);
  }
  if (!empty($_POST["computer2"])) {
    $computer2 = test_input($_POST["computer2"]);
  }
  if (!empty($_POST["college3"])) {
    $college3 = test_input($_POST["college3"]);
  }
  if (!empty($_POST["name3"])) {
    $name3 = test_input($_POST["name3"]);
  }
  if (!empty($_POST["no3"])) {
    $no3 = test_input($_POST["no3"]);
  }
  if (!empty($_POST["english3"])) {
    $english3 = test_input($_POST["english3"]);
  }
  if (!empty($_POST["maths3"])) {
    $maths3 = test_input($_POST["maths3"]);
  }
  if (!empty($_POST["biology3"])) {
    $biology3 = test_input($_POST["biology3"]);
  }
  if (!empty($_POST["physics3"])) {
    $physics3 = test_input($_POST["physics3"]);
  }
  if (!empty($_POST["computer3"])) {
    $computer3 = test_input($_POST["computer3"]);
  }
  if (!empty($_POST["college4"])) {
    $college4 = test_input($_POST["college4"]);
  }
  if (!empty($_POST["name4"])) {
    $name4 = test_input($_POST["name4"]);
  }
  if (!empty($_POST["no4"])) {
    $no4 = test_input($_POST["no4"]);
  }
  if (!empty($_POST["english4"])) {
    $english4 = test_input($_POST["english4"]);
  }
  if (!empty($_POST["maths4"])) {
    $maths4 = test_input($_POST["maths4"]);
  }
  if (!empty($_POST["biology4"])) {
    $biology4 = test_input($_POST["biology4"]);
  }
  if (!empty($_POST["physics4"])) {
    $physics4 = test_input($_POST["physics4"]);
  }
  if (!empty($_POST["computer4"])) {
    $computer4 = test_input($_POST["computer4"]);
  }
  if (!empty($_POST["college5"])) {
    $college5 = test_input($_POST["college5"]);
  }
  if (!empty($_POST["name5"])) {
    $name5 = test_input($_POST["name5"]);
  }
  if (!empty($_POST["no5"])) {
    $no5 = test_input($_POST["no5"]);
  }
  if (!empty($_POST["english5"])) {
    $english5 = test_input($_POST["english5"]);
  }
  if (!empty($_POST["maths5"])) {
    $maths5 = test_input($_POST["maths5"]);
  }
  if (!empty($_POST["biology5"])) {
    $biology5 = test_input($_POST["biology5"]);
  }
  if (!empty($_POST["physics5"])) {
    $physics5 = test_input($_POST["physics5"]);
  }
  if (!empty($_POST["computer5"])) {
    $computer5 = test_input($_POST["computer5"]);
  }



}


function test_input($data)
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
// echo "$college1 <br>";
// echo "$name1 <br>";
// echo "$no1 <br>";
// echo "$english1 <br>";
// echo "$maths1 <br>";
// echo "$biology1 <br>";
// echo "$physics1 <br>";
// echo "$computer1 <br>";
// echo "$college2 <br>";
// echo "$name2 <br>";
// echo "$no2 <br>";
// echo "$english2 <br>";
// echo "$maths2 <br>";
// echo "$biology2 <br>";
// echo "$physics2 <br>";
// echo "$computer2 <br>";
// echo "$college3 <br>";
// echo "$name3 <br>";
// echo "$no3 <br>";
// echo "$english3 <br>";
// echo "$maths3 <br>";
// echo "$biology3 <br>";
// echo "$physics3 <br>";
// echo "$computer3 <br>";
// echo "$college4 <br>";
// echo "$name4 <br>";
// echo "$no4 <br>";
// echo "$english4 <br>";
// echo "$maths4 <br>";
// echo "$biology4 <br>";
// echo "$physics4 <br>";
// echo "$computer4 <br>";
// echo "$college5 <br>";
// echo "$name5 <br>";
// echo "$no5 <br>";
// echo "$english5 <br>";
// echo "$maths5 <br>";
// echo "$biology5 <br>";
// echo "$physics5 <br>";
// echo "$computer5 <br>";
 ?>
<div class="tablecontainer">
  <table>
  <tr><th>College</th><th>Student Name</th><th>ROLL NO</th><th>Marks in English</th><th>Marks in Maths</th><th>marks in Biology</th><th>Marks in Physics</th><th>Marks in Computer</th></tr>
  <tr><td><?php echo "$college1"; ?></td><td><?php echo "$name1"; ?></td><td><?php echo "$no1"; ?></td><td><?php echo "$english1"; ?></td><td><?php echo "$maths1"; ?></td><td><?php echo "$biology1"; ?></td><td><?php echo "$physics1"; ?></td><td><?php echo "$computer1"; ?></td></tr>
  <tr><td><?php echo "$college2"; ?></td><td><?php echo "$name2"; ?></td><td><?php echo "$no2"; ?></td><td><?php echo "$english2"; ?></td><td><?php echo "$maths2"; ?></td><td><?php echo "$biology2"; ?></td><td><?php echo "$physics2"; ?></td><td><?php echo "$computer2"; ?></td></tr>
  <tr><td><?php echo "$college3"; ?></td><td><?php echo "$name3"; ?></td><td><?php echo "$no3"; ?></td><td><?php echo "$english3"; ?></td><td><?php echo "$maths3"; ?></td><td><?php echo "$biology3"; ?></td><td><?php echo "$physics3"; ?></td><td><?php echo "$computer3"; ?></td></tr>
  <tr><td><?php echo "$college4"; ?></td><td><?php echo "$name4"; ?></td><td><?php echo "$no4"; ?></td><td><?php echo "$english4"; ?></td><td><?php echo "$maths4"; ?></td><td><?php echo "$biology4"; ?></td><td><?php echo "$physics4"; ?></td><td><?php echo "$computer4"; ?></td></tr>
  <tr><td><?php echo "$college5"; ?></td><td><?php echo "$name5"; ?></td><td><?php echo "$no5"; ?></td><td><?php echo "$english5"; ?></td><td><?php echo "$maths5"; ?></td><td><?php echo "$biology5"; ?></td><td><?php echo "$physics5"; ?></td><td><?php echo "$computer5"; ?></td></tr>
  </table>

</div>



<div class="contaier">
  <?php
  $english = array( $name1 => $english1 , $name2 => $english2 , $name3 => $english3 ,$name4 => $english4 , $name5 => $english5);
  $maths = array( $name1 => $maths1 , $name2 => $maths2 , $name3 => $maths3 ,$name4 => $maths4 , $name5 => $maths5);
  $biology = array( $name1 => $biology1 , $name2 => $biology2 , $name3 => $biology3 ,$name4 => $biology4 , $name5 => $biology5);
  $physics = array( $name1 => $physics1 , $name2 => $physics2 , $name3 => $physics3 ,$name4 => $physics4 , $name5 => $physics5);
  $computer = array( $name1 => $computer1 , $name2 => $computer2 , $name3 => $computer3 ,$name4 => $computer4 , $name5 => $computer5);

  echo "<b><br>English</b><br>";
  arsort($english);
  foreach($english as $x => $x_value) {
      echo "Name=" . $x . ", Mark=" . $x_value;
      echo "<br>";
  }

  echo "<b><br>Maths</b><br>";
  arsort($maths);
  foreach($maths as $x => $x_value) {
      echo "Name=" . $x . ", Mark=" . $x_value;
      echo "<br>";
  }

  echo "<b><br>Biology</b><br>";
  arsort($biology);
  foreach($biology as $x => $x_value) {
      echo "Name=" . $x . ", Mark=" . $x_value;
      echo "<br>";
  }

  echo "<b><br>Physics</b><br>";
  arsort($physics);
  foreach($physics as $x => $x_value) {
      echo "Name=" . $x . ", Mark=" . $x_value;
      echo "<br>";
  }

  echo "<b><br>Computer</b><br>";
  arsort($computer);
  foreach($computer as $x => $x_value) {
      echo "Name=" . $x . ", Mark=" . $x_value;
      echo "<br>";
  }



   ?>

</div>
