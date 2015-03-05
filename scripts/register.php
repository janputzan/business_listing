<?php

	require_once("database.php");
	require_once("validation.php");

	$username = trim($_POST['username']);
	$password = trim($_POST['password']);

	if (validateRegister($username, $password)) {

		$db = getDatabase();

		if (register($db, $username, $password)) {

			echo 'registered';
		
		} else {

			echo 'not registered';
		}
	} else {

		echo 'validation failed';
	}

?>