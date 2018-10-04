<!DOCTYPE html>
<html>
  <head>
    <script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js">
    </script>
    <script>
    $(function() {
      $("form[name='reg']").validate({
        rules: {
          name: "required",
          email: {
            required: true,
            email: true
          },
          number: {
            required: true,
            digits: true,
            rangelength: [10, 10]
          },
          gender: "required",
        },
        messages: {
          name: "Please enter your name",
          email: "Please enter a valid email address",
          gender: "please select a Gender",
          number: "please enter a valid phone Number"
        },
        submitHandler: function(form) {
          form.submit();
        }
      });
    });
    </script>
    <title></title>
  </head>
  <body>
    <form name="reg" method="post">
      <p>Name <input type="text" name="name"></p>
      <p>Email_id <input type="text" name="email">
      <p>Mobile Number <input type="text" name="number">
      <br>
      Gender:
      <br>
      <input type="radio" name="gender" value="Female">Female
      <input type="radio" name="gender" value="Male">Male
      <input type="radio" name="gender" value="other">Other
      <br><br>
      <input type="submit" name="" value="Submit">
    </form>

  </body>
</html>
