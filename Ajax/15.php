<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
    <?php
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $mobile = $_POST["mobile"];
    $country = $_POST["country"];
    $comments = $_POST["comments"];
    $nameErr = $emailErr = $phoneErr = $mobileErr = $countryErr = "";
    $errorarray =array();
    $z = 0;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (isset($name) && $name !='' && $name !='undefined'){
        if (preg_match("/^[a-zA-Z ]*$/",$name)) {
          $name = test_input($_POST["name"]);
        }
      }
      if (isset($email) && $email !='' && $email !='undefined'){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $email = test_input($_POST["email"]);
      }}
      if (isset($phone) && $phone !='' && $phone !='undefined'){
        if (!is_numeric($phone)) {
          $phone = test_input($_POST["phone"]);
        }}
      if (isset($mobile) && $mobile !='' && $mobile !='undefined'){
        if (!is_numeric($mobile)) {
          $mobile = test_input($_POST["mobile"]);
          }}
      if (isset($country) && $country !='' && $country !='undefined'){
        if (preg_match("/^[a-zA-Z ]*$/",$country)) {
          $country = test_input($_POST["country"]);
        }}

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
       // $con = mysqli_connect("localhost","root","","db_steiron") or die("connection failed");
       // $query = "insert into tbl_contacts(Name,Email,Phone,Mobile,Country,Comments)values('$name','$email','$phone','$mobile','$country','$comments')";
       // $res = mysqli_query($con,$query);
       // $query2 = "select * FROM tbl_contacts ORDER BY Id DESC";
       // $res1 = mysqli_query($con,$query2);
       // $row = mysqli_fetch_array($res1);
       // $msg = "Name : ". $row['Name'] .
       // ",\r\n Email : ". $row['Email'] .
       // ",\r\n Phone No : ". $row['Phone'] .
       // ",\r\n Mobile No : ". $row['Mobile'] .
       // ",\r\n Country : ". $row['Country'] .
       // ",\r\n Comments : ". $row['Comments'];
       // mail("srihari.ayush@gmail.com","Form Data",$msg);
       // echo "All Clear";
       // header("Location: {$_SERVER['HTTP_REFERER']}");
       // exit;
       }
       else {
         print_r($errorarray);
       //   echo "<br>";
       //   echo "<h2>Your Input is Wrong:</h2>";
       //   echo $nameErr;
       //   echo "<br>";
       //   echo $emailErr;
       //   echo "<br>";
       //   echo $phoneErr;
       //   echo "<br>";
       //   echo $mobileErr;
       //   echo "<br>";
       //   echo $countryErr;
       //   echo "<br>";
         return $errorarray;
       }
      ?>

  </body>
</html>
