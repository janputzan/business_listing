<?php

	require('../App.php');
	App::start();

	if (Auth::attempt($_POST)) {

		Message::set(array('message' => 'You are logged in'), 'messages');

		if (Auth::is_admin()) {

			header("Location: ../pages/dashboard.php");
		
		} else {

			header("Location: ../pages/userDashboard.php");
		} 

	} else {

		Message::set(array('message' => 'Wrong credentials. Try again.'), 'messages');
		$_SESSION['input-old'] = $_POST;
		header("Location: {$_SERVER['HTTP_REFERER']}");
	}

?>