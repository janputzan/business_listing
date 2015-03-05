<?php

	require_once("database.php");
	require_once("validation.php");
	require_once("User.php");

	// get input from the form and trim it from trailing empyy spaces
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);

	


	// check if input passes the validation
	if (Validation::register($username, $password)) {

		$db = new Database;


		if ($db->register($username, $password)) {

			echo 'registered';
		
		} else {

			echo 'not registered';
		}
	} else {

		echo 'validation failed';
	}

?>