<?php

	require('../App.php');
	App::start();

	Auth::logout();
	Message::set('You have logged out', 'messages');
	header("Location: ../pages/homePage.php");

?>