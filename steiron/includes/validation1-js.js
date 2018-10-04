jq(function() {
  jq('#loader').hide();
  jq('#success_message').hide();
  jq('#error_message').hide();
  jq("form[name='my-form']").validate({
    rules: {
      name: "required",
      email: {
        required: true,
        email: true
      },
    messages: {
      name: "Please enter your name",
      email: "Please enter a valid email address",
    },
    submitHandler: function(form) {
      jq('#loader').show();
      jq('#error_message').show();
      setTimeout("jq('#error_message').hide();", 2000);
      setTimeout("jq('#success_message').show();", 4000);
      var name=jq('#name1_id').val();
      var email =jq('#email1_id').val();
      var comments =jq('#comments1_id').val();
      var url="validation1-php.php";
      jq.ajax({
             type: "POST",
              url: url,
             data: {'name': name, 'email': email, 'comments':comments},
             success: function(reseponse)
             {
               jq("form").trigger("reset");
               jq('#loader').hide();
               jq('#success_message').hide();
               console.log(reseponse);
                 var o = JSON.parse(reseponse);
                 jq.each(o, function(index, value) {
                   alert(value);
                   });
             }
           });
           // form.submit();
    }
  });
});
