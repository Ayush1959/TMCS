<?php
$name = $l_name = $email = $phone = $mobile= $country = $comments = "";
$nameErr = $l_nameErr = $emailErr = $phoneErr = $mobileErr = $countryErr = "";
$errorarray =array();
$z = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["firstName"])) {
    $nameErr = "Name is Required";
    $errorarray["NameErr"]=$nameErr;
    $z += 1;
  }
  else {
    $name = test_input($_POST["firstName"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "only letters and white spaces allowed in Name";
      $errorarray["NameErr"]=$nameErr;
      $z += 1;
    }
  }
  if (empty($_POST["lastName"])) {
    $l_nameErr = "Name is Required";
    $errorarray["L_NameErr"]=$nameErr;
    $z += 1;
  }
  else {
    $l_name = test_input($_POST["lastName"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$l_name)) {
      $l_nameErr = "only letters and white spaces allowed in Name";
      $errorarray["L_NameErr"]=$l_nameErr;
      $z += 1;
    }
  }
  if (empty($_POST["email"])) {
    $emailErr = "Email is Required";
    $errorarray["EmailErr"]=$emailErr;
    $z += 1;
  }
  else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      $errorarray["EmailErr"]=$emailErr;
      $z += 1;
    }
  }
  // if (empty($_POST["phone"])) {
  // }
  // else {
  //   $phone = test_input($_POST["phone"]);
  //   if (!is_numeric($phone)) {
  //     $phoneErr = "Phone number with STD code is required";
  //     $errorarray["PhoneErr"]=$phoneErr;
  //     $z += 1;
  //   }
  // }
  if (empty($_POST["phone"])) {
    $mobileErr = "Mobile Number is Required";
    $errorarray["MobileErr"]=$mobileErr;
    $z += 1;
  }
  else {
    $mobile = test_input($_POST["phone"]);
    if (!is_numeric($mobile)) {
      $mobileErr = "Please enter 10 digit Mobile Number";
      $errorarray["MobileErr"]=$mobileErr;
      $z += 1;
    }
    else {
      $numlength = strlen((string)$mobile);
      if ($numlength != 10) {
        $mobileErr = "Only 10 digit Mobile Number is allowed";
        $errorarray["MobileErr"]=$mobileErr;
        $z += 1;
      }
    }
  }
//   if (empty($_POST["country"])) {
//     $countryErr = "Select your Country";
//     $errorarray["CountryErr"]=$countryErr;
//     $z += 1;
//   }
//   else {
//     $country = test_input($_POST["country"]);
// }
  if (empty($_POST["exampleFormControlTextarea1"])) {
    $commentErr = "No comment";
  }
  else {
    $comments = test_input($_POST["exampleFormControlTextarea1"]);
  }
  }
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

 if ($z == 0) {
   $con = mysqli_connect("localhost","salesfok_admin","admin@1234","salesfok_contact") or die("connection failed");
   $query = "insert into tbl_contacts(Name,Last_name,Email,Phone,Description)values('$name','$l_name','$email','$mobile','$comments')";
   $res = mysqli_query($con,$query);
   $msg = "Name : ". $name .
   ",\r\n Email : ". $email .
   ",\r\n Last Name : ". $l_name .
   ",\r\n Mobile No : ". $mobile .
   // ",\r\n Country : ". $country .
   ",\r\n Description : ". $comments;

     require 'PHPMailer-master/class.phpmailer.php';
     $mail = new PHPMailer;

$mail->IsSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                 // Specify main and backup server
$mail->Port = 587;                                    // Set the SMTP port
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'salesfokuzcrm@gmail.com';                // SMTP username
$mail->Password = 'salesfokuzcrm@1234';                  // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

$mail->From = 'salesfokuzcrm@gmail.com';
$mail->FromName = 'Salesfokuz';
$mail->AddAddress('hello@salesfokuz.com', 'Ashiq M C');  // Add a recipient
// $mail->AddAddress('ellen@example.com');               // Name is optional

$mail->IsHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Contact Mail';
$mail->Body    = $msg;
// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->Send()) {
    echo "Sucess";
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;

   }
   else {
     print_r(json_encode($errorarray));
   }
 }

   ?>