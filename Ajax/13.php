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
          country: "please enter a Country",
          phone: "please enter with STD code",
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
        var country =$('#country_id').val();
        var comments =$('#comments_id').val();
        var url="14.php";
        $.ajax({
               type: "POST",
                url: url,
               // serialize your form's elements.
               data: {'name': name, 'email': email, 'phone': phone, 'mobile': mobile, 'country':country, 'comments':comments},
               success: function(reseponse)
               //
               {
                 console.log(reseponse);
                   // "something" is the class of your form wrapper
                   // $('.something').html(data);
                   // alert(data);
                   // z :reseponse[2];
                   var o = JSON.parse(reseponse);
                   alert(o.EmailErr);
                   // alert(reseponse["EmailErr"]);
               }
             });
        });
    });


    </script>

  </head>
  Array
(
[0] => Name is Required
[EmailErr] => Email is Required
[PhoneErr] => Only Numbers are allowed
[MobileErr] => Only Numbers are allowed
[CountryErr] => Type your Country Name
)
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

      <input  class="form-control" placeholder="Country" name="country" id="country_id">
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
