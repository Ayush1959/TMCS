
<?php
    $request_body = file_get_contents("php://input");
    $data = json_decode($request_body);
    $name = $data->name;
    $email = $data->email;
    $address = $data->address;
    $chocolate = $data->chocolate;
    $otherTreat = $data->otherTreat;
    $planName = $data->plan;
    $z = 0;

    if (isset($email)) {
        $c_email = $email;
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
    if (isset($address)) {
        $c_address = $address;
    } else {
        $z++;
    }
    if (isset($planName)) {
        $c_planName = $planName;
        $c_otherTreat = $otherTreat;
        $c_chocolate = $chocolate;
    } else {
        $z++;
    }
?>

<?php
if ($z == 0) {
    $con = mysqli_connect("localhost","root","","db_form_wizard") or die("connection failed");
    $query = "insert into tbl_data(Name,Email,Address,Chocolate,OtherTreat,planName)values('$c_name','$c_email','$c_address','$c_chocolate','$c_otherTreat','$c_planName')";
    $res = mysqli_query($con,$query);
    $ary["Sucsess"]=200;
    $ary["Name"]=$name;
    print_r(json_encode($ary));
}
else {
    echo("Fail");
}

?>