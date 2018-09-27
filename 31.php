<html>
<body>

<?php
$name = $email = $number = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $number = test_input($_POST["number"]);
  }

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

 ?>

 <form method="post" >
   Name : <input type="text" name="name">
   <br>
   E-Mail : <input type="text" name="email">
   <br>
   Number : <input type="text" name="number">
   <br>
   <input type="submit" name="submit" value="Submit">
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $number;
echo "<br>";
?>

</body>
</html>
