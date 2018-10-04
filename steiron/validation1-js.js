$(function() {
  $('#loader').hide();
  $('#success_message').hide();
  $('#error_message').hide();
  $("form[name='my-form']").validate({
    rules: {
      name: "required",
      email: {
        required: true,
        email: true
      },
    },
    messages: {
      name: "Please enter your name",
      email: "Please enter a valid email address",
    },
    submitHandler: function(form) {
      $('#loader').show();
      $('#error_message').show();
      setTimeout("$('#error_message').hide();", 2000);
      setTimeout("$('#success_message').show();", 4000);
      var name=$('#name1_id').val();
      var email =$('#email1_id').val();
      var comments =$('#comments1_id').val();
      var url="validation1-php.php";
      $.ajax({
             type: "POST",
              url: url,
             data: {'name': name, 'email': email, 'comments':comments},
             success: function(reseponse)
             {
               $("form").trigger("reset");
               $('#loader').hide();
               $('#success_message').hide();
               console.log(reseponse);
                 var o = JSON.parse(reseponse);
                 $.each(o, function(index, value) {
                   alert(value);
                   });
             }
           });
    }
  });
});
