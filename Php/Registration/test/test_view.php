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
    echo '<img src="'.$target_file.'">';
}

echo '<a href="newslist.php">News List</a>';
?>
<html>
<body>
<!-- <img src="719623.png" alt="Smiley face"> -->
</body>
</html>
