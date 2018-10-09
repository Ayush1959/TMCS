jq(function() {
    jq("form[name='login-form']").validate({
    rules: {
      username: {
        required: true,
        rangelength: [2, 15]
      },
      password: "required",
    },
    messages: {
      username: "Please enter your user name",
      password: "Please enter your password"
    },
    submitHandler: function(form) {
      var username=jq('#username_id').val();
      var password =jq('#password_id').val();
      var url="login-validation.php";
      jq.ajax({
             type: "POST",
              url: url,
             data: {'username': username, 'password': password},
             success: function(reseponse)
             {
               // console.log(typeof(reseponse));
               if ($.trim(reseponse) == "admin"){
                 alert("admin");

               }
               if ($.trim(reseponse) == "user") {
                 alert("user");

               }
               if ($.trim(reseponse) == "incorrect credentials") {
                 alert("error in credentials");

               }
             }
           });
    }
  });
});
