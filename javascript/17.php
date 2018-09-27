<html>
<body>
<head>
<script>

function validateForm (){
  var x = document.forms["myForm"]["fname"].value;
  if (x == "") {
    alert("Fill out name");
    return false;
  }
}
</script>
</head>


<form name="myForm" onsubmit="return validateForm()" method="post">
  Name: <input type="text" name="fname">
  <input type="submit" value="Submit">
</form>

</body>
</html>
