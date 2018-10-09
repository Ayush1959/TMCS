<?php
ob_start();
	include'connect.php';
	
?>

<html>
<body>
<?php

if(isset($_GET['id']))
{
$id=$_GET['id'];
$query1=mysql_query("delete from register where register_id='$id'");
if($query1)
{
     
	header("Location:http://localhost/dash/blood.php");
	exit();
}else{
     
    header("Location:http://localhost/dash/blood.php");
    exit();
}
}
?>
</body>
</html>