<?php
$name = $email = $comments = "";
$nameErr = $emailErr = "";
$errorarray =array();
$z = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is Required";
    $errorarray["NameErr"]=$nameErr;
    $z += 1;
  }
  else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "only letters and white spaces allowed in Name";
      $errorarray["NameErr"]=$nameErr;
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
  if (empty($_POST["comments"])) {
    $commentErr = "No comment";
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
   // echo "Success";
   $con = mysqli_connect("localhost","root","","db_steiron") or die("connection failed");
   $query = "insert into tbl_enquiry(Name,Email,Comments)values('$name','$email','$comments')";
   $res = mysqli_query($con,$query);
   $query2 = "select * FROM tbl_enquiry ORDER BY Id DESC";
   $res1 = mysqli_query($con,$query2);
   $row = mysqli_fetch_array($res1);
   $msg = "Name : ". $row['Name'] .
   ",\r\n Email : ". $row['Email'] .
   ",\r\n Comments : ". $row['Comments'];
   mail("ayush@trinitymascot.com","Form Data",$msg);
   echo "Message Saved";
   // var message =jq('#msg_id').val();
   // var url="contact.php";
   // jq.ajax({
   //        type: "POST",
   //         url: url,
   //        data: {'name': name, 'email': email, 'phone': phone, 'mobile': mobile, 'country':country, 'comments':comments},
   //        success: function(reseponse)
   //        {
   //          console.log(reseponse);
   //          alert("Success");
   //          // $success_message = "hey";
   //            var o = JSON.parse(reseponse);
   //            jq.each(o, function(index, value) {
   //              alert(value);
   //              });
   //        }
   //      });
   header("Location: {$_SERVER['HTTP_REFERER']}");
   exit;
   }
   else {
     print_r(json_encode($errorarray));
     // $x = "Data not sent";
   }
