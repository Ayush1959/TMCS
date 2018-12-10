
<?php
$dateString = '2017-01-02 00:00:00';
$myDateTime = DateTime::createFromFormat('Y-m-d h:i:s', $dateString);
$newDateString = $myDateTime->format('m/d/Y');
echo $newDateString;