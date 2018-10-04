<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
  $(document).ready(function(){
    $("#bb").click(function(){
      var url="10.php";
      $.ajax({
             // type: "POST",
              // url: url,
             // serialize your form's elements.
             // data: $("#1"),
             var formValues = $(#o1).serialize();
             $.post("10.php", , function(data){
            // Display the returned data in browser
            // $("#result").html(data);
        });
             success: function(data)
             //
             {
                 // "something" is the class of your form wrapper
                 // $('.something').html(data);
                 alert(data);
             }
           });
      });
  });


  </script>
  </head>

<body>

<p id="o1">Name<input type="text" name="name"></p>
<!-- <p>Email<input type="text" name="email"></p> -->
<button id="bb">Submit</button>
<!-- <div id="result"></div> -->

</body>

</html>
