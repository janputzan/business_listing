<?php

	require('../App.php');
	App::start();

	// get input from the form and trim it from trailing empyy spaces

	$input = array_map('trim', $_POST);
	$input = array_map('strip_tags', $input);

	// check if input passes the validation
	if (Validation::registerBusiness($input)) {

		$business = new Business;

		$settings['user_id'] = 9;
		$settings['category_id'] = 1;
		$settings['is_premium'] = 0;
		$settings['is_active'] = 0;

// var_dump($input, $settings);die;
		if ($business->save($input, $settings)) {

			Message::set('Please upload image', 'messages');
			$_SESSION['wizard'] = 2;
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