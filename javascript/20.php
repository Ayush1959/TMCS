<html>
<head>

  <script>

  function validateForm (){
    var Name = document.forms["myForm"]["name"].value;
    var Email = document.forms["myForm"]["email"].value;
    var Num = document.forms["myForm"]["number"].value;
    var Gender = document.forms["myForm"]["gender"].value;
    var phoneno = /^\d{10}$/;
    var ckName = /[^A-z ]/g;
    var chNAME = Name.match(ckName);
    var ckNum = /^[0-9]+$/;
    if (Name == "") {
      alert("Field cannot be Empty please Enter Name");
      return false;
    }
    else {
      return true;
    }
    if(Num.match(ckNum)) {
    return true;
    }
    else {
      alert("Invalid No")
      return false;
    }
    // if((No.match(phoneno)) {
    //   return true;
    //   }
    // else {
    //   alert("Number error");
    //   return false;
    //   }
    if (Gender == "") {
      alert("Please Select Gender");
      return false;
    }
    if (((Object.keys(chNAME)).length) > 0 ) {
      alert("only letters and white spaces allowed in Name");
      return false;
    }
}
    // else {
    //   if (((Object.keys(chNAME)).length) > 0 ) {
    //     alert("only letters and white spaces allowed");
    //     return false;
    //   }
    // }
    // if (((Object.keys(chNAME)).length) > 0 ) {
    //   alert("only letters and white spaces allowed");
    //   return false;
    // }

    // if (Gender == "") {
    //   alert("Please Select Gender");
    //   return false;
    // }
  // }
  </script>


</head>
<body>




<form name="myForm" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
  Name : <input type="text" name="name">
  <br>
  E-Mail : <input type="text" name="email">
  <br>
  Number : <input type="text" name="number">
  <br>
  Gender:
  <input type="radio" name="gender" value="Female">Female
  <input type="radio" name="gender" value="Male">Male
  <input type="radio" name="gender" value="other">Other
  <br><br>
  <!-- Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload"> -->
  <input type="submit" name="submit" value="Submit">
</form>



</body>
</html>
