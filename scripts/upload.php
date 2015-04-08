<?php

	require('../App.php');
	App::start();

	$target_dir = '../uploads/';

	$target_file = $target_dir . basename($_FILES['fileToUpload']['name']);

	$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

	if (Validation::uploadImage($_FILES['fileToUpload'], $target_file, $imageFileType)) {

		if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {

			Message::set('Please process payment', 'messages');
			$_SESSION['wizard'] = 3;
			header("Location: {$_SERVER['HTTP_REFERER']}");
		
		} else {

			Message::set(array('message' => 'Your file did not upload. Try again.'), 'messages');
			$_SESSION['input-old'] = $_FILES['fileToUpload'];
			header("Location: {$_SERVER['HTTP_REFERER']}");
		}
	
	} else {

		Message::set(array('message' => 'Your file did not upload. Something went wrong.'), 'messages');
		$_SESSION['input-old'] = $_FILES['fileToUpload'];
		header("Location: {$_SERVER['HTTP_REFERER']}");
	}



?>