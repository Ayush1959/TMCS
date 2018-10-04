jq(document).ready(function(){
  jq("#bb").click(function(){
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
             console.log(reseponse);
             // alert(country);
               var o = JSON.parse(reseponse);
               jq.each(o, function(index, value) {
                 alert(value);
                 });
           }
         });
    });
});
