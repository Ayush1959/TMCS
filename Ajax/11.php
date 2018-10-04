<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
  $(document).ready(function(){
    $("#bb").click(function(){
      var name=$('#username').val();
      var email =$('#email_id').val();
      var url="12.php";
      $.ajax({
             type: "POST",
              url: url,
             // serialize your form's elements.
             data: {'name': name, 'email': email},
             success: function(reseponse)
             //
             {
               console.log(reseponse);
                 // "something" is the class of your form wrapper
                 // $('.something').html(data);
                 // alert(data);
             }
           });
      });
  });


  </script>
  </head>

<body>

<p>Name<input type="text" name="name" id="username"></p>
<p>Email<input type="text" name="email" id="email_id"></p>
<button id="bb">Submit</button>

</body>

</html>
