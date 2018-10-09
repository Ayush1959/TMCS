<?php
$con = mysqli_connect("localhost","root","","db_registration") or die("connection failed");
?>

<?php
// if ($_SERVER["REQUEST_METHOD"] == "POST")
// // if(isset($_POST['update']))
// {
//   $head =$_POST['form-heading'];
//   $descr =$_POST['form-description'];
//   $query1 = "UPDATE tbl_news SET Heading='$head',Description='$descr' WHERE id=$id";
//   $res = mysqli_query($con,$query1);
//   // echo $heading;
//   // echo "<br>";
//   // echo $description;
//   // echo "<br>";
//   // echo $id;
//   header("Location: newslist.php");
// }
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
    <title>Edit Data</title>
</head>

<body>
    <a href="dashboard.php">Dashboard</a>
    <br/><br/>

    <form name="form1" method="post" action="test_edit_post.php">
                Heading : <input type="text" name="form-heading" value="<?php echo $name;?>">
                <br><br>
                Description<input type="text" name="form-description" value="<?php echo $nd;?>">
                <br>
                <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
                <input type="submit" name="update" value="Update">
    </form>
</body>
</html>
