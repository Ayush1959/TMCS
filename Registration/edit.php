<?php
session_start();
?>
<?php
$con = mysqli_connect("localhost","root","","db_registration") or die("connection failed");
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
// if(isset($_POST['update']))
{
  $head = $_POST['form-heading'];
  $descr = $_POST['form-description'];
  $id = $_POST['id'];
  $query1 = "UPDATE tbl_news SET Heading='$head',Description='$descr' WHERE id=$id";
  $res = mysqli_query($con,$query1);
  header("Location: newslist.php");
}
?>
<?php
$id=$_GET['id'];
// echo $id . "hey";
$query = "SELECT * FROM tbl_news WHERE id=$id";
$result = mysqli_query($con,$query);
while($res = mysqli_fetch_array($result))
{
    $name = $res['Heading'];
    $nd = $res['Description'];
}
?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Edit Data</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-lg-2">
        <a href="dashboard.php">Dashboard</a>
      </div>
      <br><br>
    </div>
    </div>
    <!-- <a href="dashboard.php">Dashboard</a>
    <br/><br/> -->
    <div class="container">
    <form name="form1" method="post">
      <div class="form-group">
      <label for="head">Heading:</label>
      <input type="text" id="head" class="form-control" name="form-heading" value="<?php echo $name;?>">
    </div>
    <div class="form-group">
    <label for="desc">Description:</label>
    <textarea name="form-description" class="form-control" id="desc" value="<?php echo $nd;?>" ><?php echo $nd;?></textarea>
  </div>
    <!-- <input type="text" name="form-description" value="<?php echo $nd;?>"> -->
      <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
      <button type="submit" class="btn btn-primary">Submit</button>
      <!-- <input type="submit" name="update" value="Update"> -->
    </form>
    </div>
</body>
</html>
