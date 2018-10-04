<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      $("button").click(function() {
        $("#div1").load("test.txt");
      })
    })
  </script>
</head>
<body>

  <div id="div1"><h2>Let jquery AjaX change </h2></div>
  <button>Get external content</button>
</body>
</html>
