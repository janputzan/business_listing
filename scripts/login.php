<?php

	require('../App.php');
	App::start();

	$user = new User;

	
	if ($user->checkLogin($_POST)) {

		echo 'logged in';
	} else {
		echo 'no entry';
	}


?>