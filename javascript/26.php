<html>
<head>

  <script>

  function validateForm (){
    var Name = document.forms["myForm"]["name"].value;
    var Email = document.forms["myForm"]["email"].value;
    var Num = document.forms["myForm"]["number"].value;
    var Gender = document.forms["myForm"]["gender"].value;
    var ckName = /[^A-z ]/g;
    var ckNum = /[^0-9]+$/;
    var ckEmail = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
    var lnNum = Num.toString().length;
    if (Name == "") {
      alert("Field cannot be Empty please Enter Name");
      return false;
    }
    else if(Name.match(ckName)) {
      alert("Invalid Name")
      return false;
    }
    if (Email == "") {
      alert("Field cannot be Empty please Enter Email");
      return false;
    }
    else if(!(Email.match(ckEmail))) {
      alert("Invalid Email")
      return false;
    }
    if (Num == "") {
      alert("Field cannot be Empty please Enter Phone Number");
      return false;
    }
    else if(Num.match(ckNum)) {
      alert("Invalid No")
      return false;
    }
    else if (lnNum != 10) {
      alert("Invalid Phone Number")
      return false;
    }
    if (Gender == "") {
      alert("Please Select Gender");
      return false;
    }
}
  </script>


</head>
<body>
<?php
  $name = $email = $number = $gender = "";
  $nameErr = $emailErr = $numberErr = $genderErr = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["name"])) {
      $nameErr = "Name is Required";
    }
    else {
      $name = test_input($_POST["name"]);
      if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
        $nameErr = "only letters and white spaces allowed";
        // code...
      }
    }

    if (empty($_POST["email"])) {
      $emailErr = "Email is Required";
    }
    else {
      $email = test_input($_POST["email"]);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
    }

    // $name = test_input($_POST["name"]);
    // $email = test_input($_POST["email"]);
    $number = test_input($_POST["number"]);
    if (!is_numeric($number)) {
      $numberErr = "Only Numbers are allowed";
    }

    if (empty($_POST["gender"])) {
      $genderErr = "Gender is Required";
    }
    else {
      $gender = test_input($_POST["gender"]);
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



<form name="myForm" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
  Name : <input type="text" name="name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br>
  E-Mail : <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br>
  Number : <input type="text" name="number">
  <span class="error">* <?php echo $numberErr;?></span>
  <br>
  Gender:
  <input type="radio" name="gender" value="Female">Female
  <input type="radio" name="gender" value="Male">Male
  <input type="radio" name="gender" value="other">Other
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
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
echo "$gender";
?>

</body>
</html>
