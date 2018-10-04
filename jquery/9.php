<!DOCTYPE html>
<html>
  <head>
    <script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js">
    </script>
    <script>
    $(function() {
      $("form[name='steiron']").validate({
        rules: {
          name: "required",
          email: {
            required: true,
            email: true
          },
          phone: {
            // required: true,
            digits: true,
            rangelength: [7, 7]
          },
          mobile: {
            required: true,
            digits: true,
            rangelength: [10, 10]
          },
          country: "required",
        },
        messages: {
          name: "Please enter your name",
          email: "Please enter a valid email address",
          country: "please enter a Country",
          phone: "please enter seven digit Phone number without country code",
          mobile: "Please enter your mobile number"
        },
        submitHandler: function(form) {
          form.submit();
        }
      });
    });
    </script>

  </head>
  <body>
    <?php $nameErr = $emailErr = $phoneErr = $mobileErr = $countryErr = ""; ?>

    <form name="steiron" action="11.php" method="post">
      <div class="form-group" data-aos="fade-in" data-aos-duration="1000">

      <input type="text" class="form-control" placeholder="Name" name="name" >
      <span class="error"> <?php echo $nameErr;?></span>
      <br><br>
      </div>

      <div class="form-group" data-aos="fade-in" data-aos-duration="1000">

      <input class="form-control" placeholder="Email" name="email" >
      <span class="error"> <?php echo $emailErr; ?></span>
      <br><br>
      </div>

      <div class="form-group" data-aos="fade-in" data-aos-duration="1000">

      <input type="text" class="form-control" placeholder="Phone" name="phone">
      <span class="error"> <?php echo $phoneErr; ?></span>
      <br><br>
      </div>

      <div class="form-group" data-aos="fade-in" data-aos-duration="1000">

      <input type="text" class="form-control" placeholder="Mobile" name="mobile">
      <span class="error"> <?php echo $mobileErr; ?></span>
      <br><br>
      </div>

      <div class="form-group" data-aos="fade-in" data-aos-duration="1000">

      <input  class="form-control" placeholder="Country" name="country">
      <span class="error"> <?php echo $countryErr; ?></span>
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


  </body>
</html>
