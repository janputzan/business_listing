<?php

	require_once("database.php");

	$username = $_POST['username'];
	$password = $_POST['password'];
	$db = getDatabase();

	
	if (checkLogin($db, $username, $password)) {

		echo 'logged in';
	} else {
		echo 'no entry';
	}


?>