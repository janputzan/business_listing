<?php

	require('../App.php');
	App::start();

	// get input from the form and trim it from trailing empyy spaces

	$input = array_map('trim', $_POST);

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