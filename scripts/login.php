<?php

	require_once("User.php");

	$username = $_POST['username'];
	$password = $_POST['password'];
	$user = new User;

	
	if ($user->checkLogin($username, $password)) {

		echo 'logged in';
	} else {
		echo 'no entry';
	}


?>