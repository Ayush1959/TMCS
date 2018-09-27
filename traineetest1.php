<?php
$mark1 = $mark2 = $mark3 = $mark4 = $mark5 = $mark6 = "";
$marks = $no_of = $total = "" ;
$mark1Err = $mark2Err = $mark3Err = $mark4Err = $mark5Err = $mark6Err = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["mark1"])) {
    $mark1Err = "Mark is Required";
  }
  else {
    $mark1 = test_input($_POST["mark1"]);
  }
  if (empty($_POST["mark2"])) {
    $mark2Err = "Mark is Required";
  }
  else {
    $mark2 = test_input($_POST["mark2"]);
  }
  if (empty($_POST["mark3"])) {
    $mark3Err = "Mark is Required";
  }
  else {
    $mark3 = test_input($_POST["mark3"]);
  }
  if (empty($_POST["mark4"])) {
    $mark4Err = "Mark is Required";
  }
  else {
    $mark4 = test_input($_POST["mark4"]);
  }
  if (empty($_POST["mark5"])) {
    $mark5Err = "Mark is Required";
  }
  else {
    $mark5 = test_input($_POST["mark5"]);
  }
  if (empty($_POST["mark6"])) {
    $mark6Err = "Mark is Required";
  }
  else {
    $mark6 = test_input($_POST["mark6"]);
  }
}

function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
 ?>





<html>
<head>
  <pre style="font-size:115%;"> <b> PHP Question Paper                                                                                                          Time-3 hours</b></pre>
  <hr>
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
.error{
  color: #FF0000;
}
</style>
<body>
<form method="post">
  <p><b>1. What is the difference between unset and unlink ? <input type="text" name="mark1"> </b></p>
  <span class="error">* <?php echo $mark1Err;?></span>
  <p><b>2. Explain in_array and array_push and write syntax ? <input type="text" name="mark2"> </b></p>
  <span class="error">* <?php echo $mark1Err;?></span>
  <p><b>3. How we can get the number of elements in an array ? <input type="text" name="mark3"> </b></p>
  <span class="error">* <?php echo $mark1Err;?></span>
  <p><b>4. What is the difference between include() and require() ? <input type="text" name="mark4"> </b></p>
  <span class="error">* <?php echo $mark1Err;?></span>
  <p><b>5. write a program to find the largest number of an array ? eg:-$array=[10,20,80,100]; <input type="text" name="mark5"> </p></p>
  <span class="error">* <?php echo $mark1Err;?></span>
  <p><b>6. Create this question Paper using HTML and CSS.<br>
          marks can enter for each question instead of brackets <br>
          add a submit button after the last Question<br>
          in the result page display no of questions with each mark and total mark with a table
          <input type="text" name="mark6"> </p></p>
  </p>
  <span class="error">* <?php echo $mark1Err;?></span>
  <input type="submit" name="Submit" value="Submit">

<?php
$Final_Total = $mark1 + $mark2 + $mark3 + $mark4 + $mark5 + $mark6;
$mark_array = array($mark1, $mark2, $mark3, $mark4, $mark5, $mark6 );
$same_in_array = array_unique($mark_array);
$z= "";
$x= 0;
echo "<table>";
echo "<tr><th>Category</th><th>No of questions</th><th>Total</th></tr>";
// if (!empty($same_in_array)) {
//   $z=array_pop($same_in_array);
//   $x=in_array($z,$mark_array);
//   echo "innnn .$x. <br>";
//   echo "<tr><td>$z</td><td>2</td><td>$z * 2</td>";
// }
// if (!empty($same_in_array)) {
//   $z=array_pop($same_in_array);
//   $x=in_array($z,$mark_array);
//   echo "innnn .$x. <br>";
//   echo "<tr><td>$z</td><td>2</td><td>$z * 2</td>";
// }
while (!empty($same_in_array)) {
  $z=array_pop($same_in_array);
  if ($z == $mark_array[0] && $mark_array[0] !=0) {
    $x += 1;
  }
  if ($z == $mark_array[1] && $mark_array[1] !=0) {
    $x += 1;
  }
  if ($z == $mark_array[2] && $mark_array[2] !=0) {
    $x += 1;
  }
  if ($z == $mark_array[3] && $mark_array[3] !=0) {
    $x += 1;
  }
  if ($z == $mark_array[4] && $mark_array[4] !=0) {
    $x += 1;
  }
  if ($z == $mark_array[5] && $mark_array[5] !=0) {
    $x += 1;
  }
  // else {
  //   $x = 1;
  // }
  $y = $x * $z;
  // echo "innnn .$x. <br>";
  echo "<tr><td>$z marks</td><td>$x</td><td>$y</td>";
  $x = 0;
}
echo "<tr><td>Total</td><td></td><td>$Final_Total</td>";

 ?>

<?php

// echo "mark1= .$mark1.";
// echo "<br>";
// echo "mark2= .$mark2.";
// echo "<br>";
// echo "mark3= .$mark3.";
// echo "<br>";
// echo "mark4= .$mark4.";
// echo "<br>";
// echo "mark5= .$mark5.";
// echo "<br>";
// echo "mark6= .$mark6.";
// echo "<br>";
// echo "Final_Total= .$Final_Total. ";
// echo "<br>";
print_r($mark_array);
// echo "<br>";
// print_r($same_in_array);
?>
