<?php
	error_reporting(0);

  $link = mysql_connect('localhost',"username","password");
	if(!$link)
	{
		die('Failed to connect to server: ' . mysql_error());
	}
    $db = mysql_select_db('database name',$link);
		if(!$db)
	{
		die("Unable to select database");
	}
?>