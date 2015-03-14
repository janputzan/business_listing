<?php

	require('../App.php');
	App::start();

	// get input from the form and trim it from trailing empyy spaces
	$input = array_map('trim', $_POST);
	$input = array_map('strip_tags', $input);

	// check if input passes the validation
	if (Validation::register($input)) {

		$user = new User;


		if ($user->save($input)) {

			Message::set('You have registered. Please log in.', 'messages');
			header("Location: ../pages/loginPage.php");
		
		} else {

			Message::set('There was an internal errors. Please contact the administrator.', 'messages');
			header("Location: {$_SERVER['HTTP_REFERER']}");
		}
	} else {

		Message::set('Please correct all errors.', 'messages');
		$_SESSION['input-old'] = $input;

		header("Location: {$_SERVER['HTTP_REFERER']}");
	}

?>