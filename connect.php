<?php
  //LOGIN DATA
	//server
	$db_hostname = 'localhost'; //127.0.0.1
	//db
	$db_database = ''; //HERE YOUR DATABASE
	//username
	$db_username = ''; //HERE YOUR USER NAME
	//password
	$db_password = '';  //HERE YOUR PASSWORD
	
	//HERE WE ESTABLISH THE CONNECTION
	$db_server = mysql_connect($db_hostname, $db_username, $db_password);

	//HERE WE VERIFY IF THE CONNECTION WAS SUCCESSFUL
	if (!$db_server) 
		die("Unable to connect to MySQL: " . mysql_error());

	//HERE WE SELECT THE DATABASE
	mysql_select_db($db_database) or die("Unable to select database: " . mysql_error());

?>
