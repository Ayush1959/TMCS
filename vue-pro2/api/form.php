
<?php
    // echo $_POST['msg'];
    // echo('Sucsess');
    // $request_body = file_get_contents("php://input");
    // $data = json_decode($request_body);
    // $x = $data->name;
    // echo($x);
    // echo $data;
    // echo $data->msg;
    // echo $data->name;
    // echo $data->password;
?>

<?php
    $request_body = file_get_contents("php://input");
    $data = json_decode($request_body);
    $name = $data->name;
    $password = $data->password;
    $email = $data->email;
    $z = 0;

    if (isset($email)) {
        $c_email = $email;
    }
    else {
        $z++;
    }
    if (isset($password)) {
        $c_password1 = $password;
        $c_password = md5($c_password1);
    }
    else {
        $z++;
    }
    if (isset($name)) {
        $c_name = $name;
    }
    else {
        $z++;
    }
    // echo($name);
    // echo($password);
    // echo($email);
?>

<?php
if ($z == 0) {
    $con = mysqli_connect("localhost","root","","db_form_wizard") or die("connection failed");
    $query = "insert into tbl_user(Email,Password,Name)values('$c_email','$c_password','$c_name')";
    $res = mysqli_query($con,$query);
    $ary["Sucsess"]=200;
    $ary["Name"]=$name;
    print_r(json_encode($ary));
}
else {
    echo("Fail");
}

?>