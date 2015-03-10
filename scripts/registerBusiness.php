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

			echo 'registered';

		} else {

			echo 'not registered';
		}
	} else {

		echo 'validation failed';
	}

?>