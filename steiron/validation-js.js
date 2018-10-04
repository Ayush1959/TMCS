jq(function() {
  jq('#loader').hide();
  jq('#success_message').hide();
  jq('#error_message').hide();
  jq("form[name='steiron']").validate({
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
      mobile: "Please enter your 10 digit mobile number"
    },
    submitHandler: function(form) {
      jq('#loader').show();
      jq('#error_message').show();
      setTimeout("jq('#error_message').hide();", 2000);
      setTimeout("jq('#success_message').show();", 4000);
      var name=jq('#name_id').val();
      var email =jq('#email_id').val();
      var phone =jq('#phone_id').val();
      var mobile =jq('#mobile_id').val();
      var country =jq('#dd1').val();
      var comments =jq('#comments_id').val();
      var url="validation-php.php";
      jq.ajax({
             type: "POST",
              url: url,
             data: {'name': name, 'email': email, 'phone': phone, 'mobile': mobile, 'country':country, 'comments':comments},
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
    }
  });
});
