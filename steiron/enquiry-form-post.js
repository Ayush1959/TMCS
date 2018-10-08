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
      var name=$('#name1_id').val();
      var email =$('#email1_id').val();
      var comments =$('#comments1_id').val();
      var url="enquiry-form-validation.php";
      $.ajax({
             type: "POST",
              url: url,
             data: {'name': name, 'email': email, 'comments':comments},
             success: function(reseponse)
             {
               if ($.trim(reseponse) == "Sucess") {
                 $('#loader').hide();
                 $('#success_message').show();
                 setTimeout("$('#success_message').hide();", 2000);
                 $("form").trigger("reset");
               }
               else {
                 $('#loader').hide();
                 console.log(typeof(reseponse));
                 var o = JSON.parse(reseponse);
                 var out = '<ul class="p-0">';
                 $.each(o, function(index, value) {
                   out += "<li class='pb-1'>" + value + "</li>";
                 });
                 out += "</ul>";
                 $('#error_message').html(out);
                 $('#error_message').show();
                 setTimeout("$('#error_message').hide();", 7000);
               }
             }
           });
    }
  });
});
