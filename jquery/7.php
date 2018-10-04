<!DOCTYPE html>
<html>
  <head>
    <script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js">
    </script>

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

  </body>
</html>
