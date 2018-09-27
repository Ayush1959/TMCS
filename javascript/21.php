<html>
<body>
<button onclick="myFunction()">Try it</button>
<p id="demo"></p>
<script>
function myFunction() {
    var str = "Is t22his all there is";
    // var patt1 = /[^A-z ]/g;
    // var result = str.match(patt1);
    var result = str.match(NaN);
    var len = (Object.keys(result)).length
    // if ((Object.keys(result)).length >0 ) {
      // alert(alerted)

    // }
    document.getElementById("demo").innerHTML = len;
}
</script>
</body>
</html>
<!-- str1.match(NaN);  -->
