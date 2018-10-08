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
      $('#loader').show();
      var name=jq('#name_id').val();
      var email =jq('#email_id').val();
      var phone =jq('#phone_id').val();
      var mobile =jq('#mobile_id').val();
      var country =jq('#dd1').val();
      var comments =jq('#comments_id').val();
      var url="contact-form-validation.php";
      jq.ajax({
             type: "POST",
              url: url,
             data: {'name': name, 'email': email, 'phone': phone, 'mobile': mobile, 'country':country, 'comments':comments},
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
