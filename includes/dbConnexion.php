<?php
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_DATABASE', 'test');
	$ErrorsMsgs = array();
	$db =  @new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
	if ($db->connect_error)
		die("Connection failed: " . $db->connect_error);
?>