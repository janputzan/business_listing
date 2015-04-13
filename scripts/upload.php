<?php

	require('../App.php');
	App::start();

	$imageFileType = exif_imagetype($_FILES['fileToUpload']['tmp_name']);

	if (Validation::uploadImage($_FILES['fileToUpload'], $imageFileType)) {

		try {

			// resize uploaded image before saving it
			$newImage = new Crop($_FILES['fileToUpload']['tmp_name'], array('width' => 150, 'height' => 150));
		
			$businessModel = new Business;

			// save image path to database
			if ($businessModel->update($_SESSION['wizard.business_id'], 'photo_url', $newImage->fileName)) {

				Message::set('Photo successfully uploaded', 'messages');
				$_SESSION['wizard'] = 3;
				header("Location: {$_SERVER['HTTP_REFERER']}");
				
			} else {
				
				Message::set('Something went wrong. Please contact the administrator', 'messages');
				header("Location: {$_SERVER['HTTP_REFERER']}");
			}

		} catch (Exception $e) {

			Message::set('Something went wrong. Please contact the administrator', 'messages');
			header("Location: {$_SERVER['HTTP_REFERER']}");

			return false;
		}

	} else {

		Message::set(array('message' => 'Your file did not upload. Something went wrong.'), 'messages');
		$_SESSION['input-old'] = $_FILES['fileToUpload'];
		header("Location: {$_SERVER['HTTP_REFERER']}");

		return false;
	}

?>
