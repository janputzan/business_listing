<?php

	require_once("database.php");

	$username = $_POST['username'];
	$password = $_POST['password'];
	$db = new Database;

	
	if ($db->checkLogin($username, $password)) {

		echo 'logged in';
	} else {
		echo 'no entry';
	}


?>