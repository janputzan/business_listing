<?php

	require('../App.php');
	App::start();

	if (isset($_GET['package'])) {

		$_SESSION['wizard.package'] = $_GET['package'];
		$_SESSION['wizard'] = 2;
		Message::set($_GET['package'] . ' package chosen', 'messages');
		header("Location: {$_SERVER['HTTP_REFERER']}");
	
	} else {

		Message::set('You must choose a package', 'messages');
		header("Location: {$_SERVER['HTTP_REFERER']}");
	}

?>