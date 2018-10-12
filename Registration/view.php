<?php
session_start();
?>
<?php
$con = mysqli_connect("localhost","root","","db_registration") or die("connection failed");
$id=$_GET['id'];
// echo $id;
$query = "SELECT * FROM tbl_news WHERE id=$id";
$res = mysqli_query($con,$query);
$target_dir = "uploads/";
// $path_parts = pathinfo($_FILES["fileToUpload"]["name"]);
// $image_path = $path_parts['filename'].'_'.time().'.'.$path_parts['extension'];
// $target_file = $target_dir . basename($image_path);
while ($row = mysqli_fetch_array($res)) {
    echo "Heading : " .$row['Heading']. "<br>";
    echo "Description : ".$row['Description']. "<br>";
    $img = $row['ImagePath'];
    $target_file = $target_dir . basename($img);
    // echo $target_file;
    echo '<img src="'.$target_file.'" height="200" width="350">';
}

// echo '<a href="newslist.php">News List</a>';
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <a href="newslist.php">News List</a>
        </div>
      </div>
    </div>
    <br><br>
  </body>
</html>
