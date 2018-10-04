<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
    <?php
    $name = $email = $phone = $mobile= $country = $comments = "";
    $nameErr = $emailErr = $phoneErr = $mobileErr = $countryErr = "";
    $z = 0;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["name"])) {
        $nameErr = "Name is Required";
        $z += 1;
      }
      else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
          $nameErr = "only letters and white spaces allowed";
          $z += 1;
        }
      }
      if (empty($_POST["email"])) {
        $emailErr = "Email is Required";
        $z += 1;
      }
      else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
          $z += 1;
        }
      }
      $phone = test_input($_POST["phone"]);
      if (!is_numeric($phone)) {
        $phoneErr = "Only Numbers are allowed";
        $z += 1;
      }
      $mobile = test_input($_POST["mobile"]);
      if (!is_numeric($mobile)) {
        $mobileErr = "Only Numbers are allowed";
        $z += 1;
      }
      if (empty($_POST["country"])) {
        $countryErr = "Type your Country Name";
        $z += 1;
      }
      else {
        $country = test_input($_POST["country"]);
      }
      if (empty($_POST["comments"])) {
        $commentErr = "Type your Country Name";
      }
      else {
        $comments = test_input($_POST["comments"]);
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

     <?php
     if ($z == 0) {
       $con = mysqli_connect("localhost","root","","db_steiron") or die("connection failed");
       $query = "insert into tbl_contacts(Name,Email,Phone,Mobile,Country,Comments)values('$name','$email','$phone','$mobile','$country','$comments')";
       $res = mysqli_query($con,$query);
       $query2 = "select * FROM tbl_contacts ORDER BY Id DESC";
       $res1 = mysqli_query($con,$query2);
       $row = mysqli_fetch_array($res1);
       $msg = "Name : ". $row['Name'] .
       ",\r\n Email : ". $row['Email'] .
       ",\r\n Phone No : ". $row['Phone'] .
       ",\r\n Mobile No : ". $row['Mobile'] .
       ",\r\n Country : ". $row['Country'] .
       ",\r\n Comments : ". $row['Comments'];
       // mail("srihari.ayush@gmail.com","Form Data",$msg);

       header("Location: {$_SERVER['HTTP_REFERER']}");
       exit;
       }
       else {
         echo "<h2>Your Input is Wrong:</h2>";
         echo $nameErr;
         echo "<br>";
         echo $emailErr;
         echo "<br>";
         echo $phoneErr;
         echo "<br>";
         echo $mobileErr;
         echo "<br>";
         echo $countryErr;
         echo "<br>";
       }
      ?>

  </body>
</html>
