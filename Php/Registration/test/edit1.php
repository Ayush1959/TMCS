<?php
session_start();
?>
<?php
$con = mysqli_connect("localhost","root","","db_registration") or die("connection failed");
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
    $img = $res['ImagePath'];
}
?>
<html>
<head>
    <title>Edit Data</title>
</head>

<body>
    <a href="dashboard.php">Dashboard</a>
    <br/><br/>

    <form name="form1" method="post" enctype="multipart/form-data" action="edit-action.php">
                Heading : <input type="text" name="form-heading" value="<?php echo $name;?>">
                <br><br>
                Description : <input type="text" name="form-description" value="<?php echo $nd;?>">
                <br>
                Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload" value="<?php echo $img;?>">
                <br>
                <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
                <input type="submit" name="update" value="Update">
    </form>
</body>
</html>
