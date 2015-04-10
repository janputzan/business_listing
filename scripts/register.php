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

			$newUser = $user->findByEmail($input['email']);

			$_SESSION['wizard.user_id'] = $newUser->id;

			Message::set('Account successfully created', 'messages');
			$_SESSION['wizard'] = 1;
			header("Location: {$_SERVER['HTTP_REFERER']}");
		
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