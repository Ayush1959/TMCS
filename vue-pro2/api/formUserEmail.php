<?php
    $con = mysqli_connect("localhost","root","","db_form_wizard") or die("connection failed");
    $query = "select * FROM tbl_user";
    $res = mysqli_query($con,$query);
    $request_body = file_get_contents("php://input");
    $data = json_decode($request_body);
    $email = $data->email;
    $ary = [];
    while ($row = mysqli_fetch_array($res)) {
        $email2 = $row['Email'];
        $name = $row['Name'];
        if ($email == $email2) {
            $ary["Sucsess"]=200;
            $ary["Name"]=$name;
            print_r(json_encode($ary));
            // echo("Sucsess");
        }
        // else {
        //     echo("Failed");
        // }
    }
?>