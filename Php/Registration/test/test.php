<?php
$con = mysqli_connect("localhost","root","","db_registration") or die("connection failed");
$query = "select * FROM tbl_user";
$res = mysqli_query($con,$query);
?>
            <?php
               while ($row = mysqli_fetch_array($res)) {
                   // echo "<tr>";
                   $_SESSION["username2"] = $row['Username'];
                   $_SESSION["password2"] = $row['Password'];
                   // echo "<td>".$row['Code']."</td>";
                   echo $_SESSION["username2"];
                   echo "<br>";
                   echo $_SESSION["password2"];
                   // echo "<td>".$row['Name']."</td>";
                   // echo "<td>".$row['Region']."</td>";
                   // echo "</tr>";
               }

?>
