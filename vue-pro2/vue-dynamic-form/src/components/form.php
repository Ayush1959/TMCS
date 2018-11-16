<?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//   if (isset($_POST["email"])) {
//     $c_email = $_POST["email"];
//   }
//   if (isset($_POST["password"])) {
//     $c_password1 = $_POST["password"];
//     $c_password = md5($c_password1);
//       }
//   if (isset($_POST['name'])) {
//     $c_type = $_POST["name"];
//   }
// }
 ?>

<?php
    // $con = mysqli_connect("localhost","root","","db_form_wizard") or die("connection failed");
    // $query = "insert into tbl_user(Email,Password,Name)values('$c_email','$c_password','$c_name')";
    // $res = mysqli_query($con,$query);

?>

<?php
    echo $_POST['msg'];
?>