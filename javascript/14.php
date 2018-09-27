<!DOCTYPE html>
<html>
<body>

<h2>JavaScript typeof</h2>
<p>The typeof operator returns the type of a variable or an expression.</p>

<p id="demo"></p>

<script>
var car;
var c = null;
document.getElementById("demo").innerHTML =
typeof car + "<br>" +
typeof c + "<br>" +
typeof true + "<br>" +
typeof 5 + "<br>" +
typeof "John Doe";
</script>
</body>
</html>
