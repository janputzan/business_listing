<?php

	require('../App.php');
	App::start();

	// get input from the form and trim it from trailing empyy spaces

	$input = array(
		'first_name' => trim($_POST['first_name']),
		'last_name' => trim($_POST['last_name']),
		'email' => trim($_POST['email']),
		'password' => trim($_POST['password']));


	


	// check if input passes the validation
	if (Validation::register($input)) {

		$user = new User;


		if ($user->save($input)) {

			echo 'registered';
		
		} else {

			echo 'not registered';
		}
	} else {

		echo 'validation failed';
	}

?>