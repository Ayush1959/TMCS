<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Numbers</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/main_num.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->


</head>
<body>

<form method="post">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="start">Start</label>
          <input type="text" name="start" class="form-control">
        </div>

		<div class="form-group col-md-6">
          <label for="end">end</label>
          <input type="text" name="end" class="form-control">
        </div>
		</div>
		<div class="form-row">
		<div class="form-group">
                                                      <!-- <label for="sel1">Select list (select one):</label> -->
                                                      <select class="form-control btn1" name="sel1" id="sel1">
                                                        <option value="">Select</option>
                                                        <option value="odd">Odd</option>
                                                        <option value="even">Even</option>
                                                        <option value="Fibanocci">Fibanocci</option>
                                                        </select>
                                                      </div>
		</div>
    <input type="submit" name="submit" value="Submit Response">
		<!-- <button class="btn btn1 btn-default" onclick="odd(2,8)" type="button">odd </button>
		<button class="btn btn1 btn-default" onclick="even(1,9)" type="button">even </button>
		<button class="btn btn1 btn-default" onclick="Fibanocci(1,5)" type="button">Fibanocci </button> -->

</form>


		<p id="screen" class="fl_r"></p>
		<p id="screen1" class="fl_r"></p>
		<p id="screen2" class="fl_r"></p>



    <?php
    $x = 0;
    $y = 0;
    $z = 0;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (isset($_POST["start"])) {
        $x = test_input($_POST["start"]);
      }
      if (isset($_POST["end"])) {
        $y = test_input($_POST["end"]);
      }
      if (isset($_POST["sel1"])) {
        $z = test_input($_POST["sel1"]);
      }
    }

    function test_input($data)
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    // echo "$x";
    // echo "<br>";
    // echo "$y";
    // echo "<br>";
    // echo "$z";
     ?>



     <script src="js/num.js"></script>
     <script type="text/javascript">
       var x = '<?php echo $x; ?>';
       // alert(x);
       var y = '<?php echo $y; ?>';
     </script>





     <?php
     if ($z == "odd") {
       // echo "odd no";
       // echo "<br>";
       echo '<script type="text/javascript">',
     'odd(x,y);',
     '</script>'
;

       // odd( $x, $y );
     }
     if ($z == "even") {
       // echo "even no";
       // echo "<br>";
       echo '<script type="text/javascript">',
     'even(x,y);',
     '</script>'
;
       // even ($x ,$y);
     }
     if ($z == "Fibanocci") {
       // echo "Fibanocci no";
       // echo "<br>";
       echo '<script type="text/javascript">',
     'Fibanocci(x,y);',
     '</script>'
;
       // even ($x ,$y);
     }

      ?>
















  </body>
  </html>
