<?php

	require_once("User.php");
	require_once("Validation.php");

	// get input from the form and trim it from trailing empyy spaces
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);

	


	// check if input passes the validation
	if (Validation::register($username, $password)) {

		$user = new User;


		if ($user->save($username, $password)) {

			echo 'registered';
		
		} else {

			echo 'not registered';
		}
	} else {

		echo 'validation failed';
	}

?>