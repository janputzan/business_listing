<?php

	require('../App.php');
	App::start();

	// get input from the form and trim it from trailing empyy spaces

	$input = array_map('trim', $_POST);

	// check if input passes the validation
	if (Validation::registerBusiness($input)) {

		$business = new Business;

		$settings['user_id'] = 9;
		$settings['category_id'] = 1;
		$settings['is_premium'] = false;
		$settings['is_active'] = false;


		if ($business->save($input, $settings)) {

			Message::set('You have registered a business.', 'messages');
			header("Location: ../pages/homePage.php");

		} else {

			Message::set('There was an internal errors. Please contact the administrator.', 'messages');
			header("Location: {$_SERVER['HTTP_REFERER']}");
		}
	} else {

		Message::set('Please correct all errors.', 'messages');
		header("Location: {$_SERVER['HTTP_REFERER']}");
	}

?>