<?php

	require('../App.php');
	App::start();

	if (!Auth::is_admin()) {

		header("Location: ../pages/homePage.php");
		Message::set(array('message' => 'The page does not exist'), 'messages');
		
		// workaround to diplay messages on homepage
		var_dump($_SESSION);die;
	}

	if (isset($_GET['business_id']) && isset($_GET['status'])) {

		$businessModel = new Business;

		$business = $businessModel->findOne($_GET['business_id']);

		if ($business) {

			$businessModel->setActive($business->id, $_GET['status']);

			if ($_GET['status'] == 1) {

				Message::set(array('message' => 'Business set active'), 'messages');
				
			} else {

				Message::set(array('message' => 'Business set inactive'), 'messages');
			}
			header("Location: {$_SERVER['HTTP_REFERER']}");
		}
	}
?>