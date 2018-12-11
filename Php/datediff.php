<!DOCTYPE html>
<html>
<body>

<?php
$date1 = date_create("2017-02-10 00:00:00");
$date2 = date_create("2017-02-03 11:03:00");
$diff = date_diff($date1, $date2);
// print_r($diff);
$da = $diff->format("%a");
echo ($da);
?>

</body>
</html>