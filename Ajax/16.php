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
            rangelength: [7, 12]
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
          country: "please select a Country",
          phone: "please enter your phone number with STD code",
          mobile: "Please enter your mobile number"
        },
        submitHandler: function(form) {
          form.submit();
        }
      });
    });
    </script>
    <script>
    $(document).ready(function(){
      $("#bb").click(function(){
        var name=$('#name_id').val();
        var email =$('#email_id').val();
        var phone =$('#phone_id').val();
        var mobile =$('#mobile_id').val();
        var country =$('#dd1').val();
        var comments =$('#comments_id').val();
        var url="17.php";
        $.ajax({
               type: "POST",
                url: url,
               data: {'name': name, 'email': email, 'phone': phone, 'mobile': mobile, 'country':country, 'comments':comments},
               success: function(reseponse)
               {
                 console.log(reseponse);
                 alert(country);
                   var o = JSON.parse(reseponse);
                   $.each(o, function(index, value) {
                     alert(value);
                     });
               }
             });
        });
    });


    </script>

  </head>
  <body>
    <?php $nameErr = $emailErr = $phoneErr = $mobileErr = $countryErr = ""; ?>

    <form name="steiron">
      <div class="form-group" data-aos="fade-in" data-aos-duration="1000">

      <input type="text" class="form-control" placeholder="Name" name="name" id="name_id" >
      <span class="error"> <?php echo $nameErr;?></span>
      <br><br>
      </div>

      <div class="form-group" data-aos="fade-in" data-aos-duration="1000">

      <input class="form-control" placeholder="Email" name="email" id="email_id" >
      <span class="error"> <?php echo $emailErr; ?></span>
      <br><br>
      </div>

      <div class="form-group" data-aos="fade-in" data-aos-duration="1000">

      <input type="text" class="form-control" placeholder="Phone" name="phone" id="phone_id">
      <span class="error"> <?php echo $phoneErr; ?></span>
      <br><br>
      </div>

      <div class="form-group" data-aos="fade-in" data-aos-duration="1000">

      <input type="text" class="form-control" placeholder="Mobile" name="mobile" id="mobile_id">
      <span class="error"> <?php echo $mobileErr; ?></span>
      <br><br>
      </div>

      <div class="form-group" data-aos="fade-in" data-aos-duration="1000">

      <!-- <input  class="form-control" placeholder="Country" name="country" id="country_id"> -->
      <!-- <p> -->
      <label for="dd1">Country :</label><br/>
      <select name="dd1" id="dd1" class="required">
        <option value="">None</option>
        <option value="Afganistan">Afganistan</option>
        <option value="Albania">Albania</option>
        <option value="Algeria">Algeria</option>
        <option value="Andorra">Andorra</option>
        <option value="Angola">Angola</option>
        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
        <option value="Argentina">Argentina</option>
        <option value="Armenia">Armenia</option>
        <option value="Australia">Australia</option>
        <option value="Austria">Austria</option>
        <option value="Azerbaijan">Azerbaijan</option>
        <option value="The Bahamas">The Bahamas</option>
        <option value="Bahrain">Bahrain</option>
        <option value="Bangladesh">Bangladesh</option>
        <option value="Barbados">Barbados</option>
        <option value="Belarus">Belarus</option>
    </select>
    <!-- </p> -->
      <span class="error"> <?php echo $countryErr; ?></span>
      <br><br>
      </div>

      <div class="form-group" data-aos="fade-in" data-aos-duration="1000">
      <label class="text-muted">Comments</label>
      <textarea class="form-control" name="comments" id="comments_id" ></textarea>
      <br><br>
      </div>


      <button id="bb" type="submit" class="viewmore float-right border-0" data-aos="fade-in" data-aos-duration="1000">Send</button>
    </form>

    <p id="demo"></p>


  </body>
</html>
