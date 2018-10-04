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
          number: "please enter seven digit number without country code",
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

    <form name="steiron" method="post">
    <div class="form-group" data-aos="fade-in" data-aos-duration="1000">

    <input type="text" class="form-control" placeholder="Name" name="name" >
    <br><br>
    </div>

    <div class="form-group" data-aos="fade-in" data-aos-duration="1000">

    <input class="form-control" placeholder="Email" name="email" >
    <br><br>
    </div>

    <div class="form-group" data-aos="fade-in" data-aos-duration="1000">

    <input type="text" class="form-control" placeholder="Phone" name="phone">
    <br><br>
    </div>

    <div class="form-group" data-aos="fade-in" data-aos-duration="1000">

    <input type="text" class="form-control" placeholder="Mobile" name="mobile">
    <br><br>
    </div>

    <div class="form-group" data-aos="fade-in" data-aos-duration="1000">

    <input  class="form-control" placeholder="Country" name="country">
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
