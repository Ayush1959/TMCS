<html>
<body>
<p id="demo"></p>
<p id="demo1"></p>
<p id="demo2"></p>
<script>
var car = {type:"Fiat", model:"500", color:"white"};
var person = {
    firstName:"John",
    lastName:"Doe",
    age:50,
    eyeColor:"blue",
    fullName : function() {
       return this.firstName + " " + this.lastName;
    }
};
document.getElementById("demo").innerHTML = car.type;
document.getElementById("demo1").innerHTML = person['age'];
document.getElementById("demo2").innerHTML = person.fullName();
</script>
</body>
</html>
