<?php

	require('../App.php');
	App::start();

	foreach ($_POST as $key => $value) {
		
		$input[$key] = $value;
	}

	$user = new User;

	
	if ($user->checkLogin($input)) {

		echo 'logged in';
	} else {
		echo 'no entry';
	}


?>