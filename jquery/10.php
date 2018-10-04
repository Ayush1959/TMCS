<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
    <?php
    $name = $email = $phone = $mobile= $country = $comments = "";
    $nameErr = $emailErr = $phoneErr = $mobileErr = $countryErr = "";

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
      $phone = test_input($_POST["phone"]);
      if (!is_numeric($phone)) {
        $phoneErr = "Only Numbers are allowed";
      }

      $mobile = test_input($_POST["mobile"]);
      if (!is_numeric($mobile)) {
        $mobileErr = "Only Numbers are allowed";
      }

      if (empty($_POST["country"])) {
        $countryErr = "Type your Country Name";
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



    <form name="steiron" method="post">
    <div class="form-group" data-aos="fade-in" data-aos-duration="1000">

    <input type="text" class="form-control" placeholder="Name" name="name" >
    <span class="error">* <?php echo $nameErr;?></span>
    <br><br>
    </div>

    <div class="form-group" data-aos="fade-in" data-aos-duration="1000">

    <input class="form-control" placeholder="Email" name="email" >
    <span class="error">* <?php echo $emailErr; ?></span>
    <br><br>
    </div>

    <div class="form-group" data-aos="fade-in" data-aos-duration="1000">

    <input type="text" class="form-control" placeholder="Phone" name="phone">
    <span class="error">* <?php echo $phoneErr; ?></span>
    <br><br>
    </div>

    <div class="form-group" data-aos="fade-in" data-aos-duration="1000">

    <input type="text" class="form-control" placeholder="Mobile" name="mobile">
    <span class="error">* <?php echo $mobileErr; ?></span>
    <br><br>
    </div>

    <div class="form-group" data-aos="fade-in" data-aos-duration="1000">

    <input  class="form-control" placeholder="Country" name="country">
    <span class="error">* <?php echo $countryErr; ?></span>
    <br><br>
    </div>

    <div class="form-group" data-aos="fade-in" data-aos-duration="1000">
    <label class="text-muted">Comments</label>
    <textarea class="form-control" name="comments" >

    </textarea>
    <br><br>
    </div>


    <button type="submit" class="viewmore float-right border-0" data-aos="fade-in" data-aos-duration="1000">Send</button>
    </form>


    <?php

    echo "<h2>Your Input:</h2>";
    echo $name;
    echo "<br>";
    echo $email;
    echo "<br>";
    echo $phone;
    echo "<br>";
    echo $mobile;
    echo "<br>";
    echo $country;
    echo "<br>";
    echo $comments;
     ?>

     <?php
     $con = mysqli_connect("localhost","root","","db_steiron") or die("connection failed");

     $query = "insert into tbl_contacts(Name,Email,Phone,Mobile,Country,Comments)values('$name','$email','$phone','$mobile','$country','$comments')";
     $res = mysqli_query($con,$query);


     $query2 = "select * FROM tbl_contacts ORDER BY Id DESC";

     $res1 = mysqli_query($con,$query2);

     $row = mysqli_fetch_array($res1);

     echo "<h2>Your Input:</h2>";
     echo "Name : " . $row['Name'];
     echo "<br>";
     echo "Email_Id : " .$row['Email'];
     echo "<br>";
     echo "Phone Number : " .$row['Phone'];
     echo "<br>";
     echo "Mobile : " .$row['Mobile'];
     echo "<br>";
     echo "Country : " .$row['Country'];
     echo "<br>";
     echo "Comments : " .$row['Comments'];
     echo "<br>";

     // $query4 = "DELETE FROM tbl_contacts";
     // $res = mysqli_query($con,$query4);
     $msg = "Name : ". $row['Name'] .
     ", Email : ". $row['Email'] .
     ", Phone No : ". $row['Phone'] .
     ", Mobile No : ". $row['Mobile'] .
     ", Country : ". $row['Country'] .
     ", Comments : ". $row['Comments'];
     mail("srihari.ayush@gmail.com","PhP",$msg );


     ?>


  </body>
</html>
