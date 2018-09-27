<html>
<head>

  <script>

  function validateForm (){
    var Name = document.forms["myForm"]["name"].value;
    var Email = document.forms["myForm"]["email"].value;
    var ckName = /[^A-z ]/g;
    var Num = document.forms["myForm"]["number"].value;
    var lnNum = Num.toString().length;
    // var ckEmail = /^[w-.+]+@[a-zA-Z0-9.-]+.[a-zA-z0-9]{2,4}$/;
    // var ckEmail = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
    var ckEmail = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
    if (Name == "") {
      alert("Field cannot be Empty please Enter Name");
      return false;
    }
    else if(Name.match(ckName)) {
      alert("Invalid Name")
      return false;
    }
    if (Num == "") {
      alert("Field cannot be Empty please Enter Phone Number");
      return false;
    }
    else if(lnNum != 10) {
      alert("Invalid No")
      return false;
    }
    // else if(Num.match(ckNum)) {
    //   alert("Invalid No")
    //   return false;
    // }
    // else if (lnNum ==10 ) {
    //   alert("lnNum");
    //   return false;
    // }
    if (Email == "") {
      alert("Field cannot be Empty please Enter Email");
      return false;
    }
    else if(!(Email.match(ckEmail))) {
      alert("Invalid Email")
      return false;
    }
}
  </script>


</head>
<body>




<form name="myForm" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
  Name : <input type="text" name="name">
  <br>
  Number : <input type="text" name="number">
  <br>
  E-Mail : <input type="text" name="email">
  <br>
  <br><br>
  <input type="submit" name="submit" value="Submit">
</form>



</body>
</html>
