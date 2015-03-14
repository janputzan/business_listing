<?php

	require('../App.php');
	App::start();

	if (Auth::attempt($_POST)) {

		Message::set(array('message' => 'You are logged in'), 'messages');
		header("Location: ../pages/homePage.php");

	} else {

		Message::set(array('message' => 'Wrong credentials. Try again.'), 'messages');
		header("Location: {$_SERVER['HTTP_REFERER']}");
	}

?>