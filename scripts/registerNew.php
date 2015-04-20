<?php

	require('../App.php');
	App::start();

	if (Auth::check() && !Auth::is_admin()) {


		$_SESSION['wizard'] = 1;
		$_SESSION['wizard.user_id'] = Auth::user()->id;

		header("Location: ../pages/wizardPage.php");

		return false;
	
	} else {

		Message::set(array('message' => 'You are not authorised to view this page'), 'messages');
		header("Location: ../pages/homePage.php");

		return false;
	}

?>