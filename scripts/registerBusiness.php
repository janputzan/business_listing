<?php

	require('../App.php');
	App::start();

	// get input from the form and trim it from trailing empyy spaces

	$input = array_map('trim', $_POST);
	$input = array_map('strip_tags', $input);

	// check if input passes the validation
	if (Validation::registerBusiness($input)) {

		if (isset($_SESSION['wizard.package']) && $_SESSION['wizard.package'] == 'premium') {

			$is_premium = 1;

		} else {

			$is_premium = 0;
		}

		$business = new Business;

		$settings['user_id'] = $_SESSION['wizard.user_id'];
		$settings['category_id'] = $input['category'];
		$settings['is_premium'] = $is_premium;
		$settings['is_active'] = 0;

		if ($business->save($input, $settings)) {

			Message::set('Please upload image', 'messages');
			$_SESSION['wizard.business_id'] = $business->findByName($input['name'])->id;
			$_SESSION['wizard'] = 3;
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