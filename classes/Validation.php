<?php

class Validation {

	static public function register($input) {

		$check = true;

		if (!between($input['first_name'], 3, 30)) {

			Message::set(array('first_name' => 'First Name must be between 3 and 30 characters long'), 'errors');

			$check = false;
		}
		if (!between($input['last_name'], 3, 30)) {

			Message::set(array('last_name' => 'Last Name must be between 3 and 30 characters long'), 'errors');

			$check = false;
		}
		if (!filter_var($input['email'], FILTER_VALIDATE_EMAIL)) {

			Message::set(array('email' => 'You email must be valid'), 'errors');

			$check = false;
		}
		if (!isUnique($input['email'], 'email', 'users')) {

			Message::set(array('email' => 'This email is already in use, please log in'), 'errors');

			$check = false;
		}
		if (!between($input['password'], 8, 30)) {

			Message::set(array('password' => 'Password must be between 8 and 30 characters'), 'errors');

			$check = false;
		}

		return $check;
	}

	static public function registerBusiness($input) {

		extract($input);

		$check = true;

		if (!between($name, 3, 30)) {

			Message::set(array('name' => 'Business Name must be between 3 and 30 characters long'), 'errors');

			$check = false;
		}
		if (!isUnique($name, 'name', 'businesses')) {

			Message::set(array('name' => 'This Business Name is already in use, please log in'), 'errors');

			$check = false;
		}
		if (!between($address_1, 3, 30)) {

			Message::set(array('address_1' => 'Address must be between 3 and 30 characters long'), 'errors');

			$check = false;
		}
		if (!between($city, 3, 30)) {

			Message::set(array('city' => 'City must be between 3 and 30 characters long'), 'errors');

			$check = false;
		}
		if (!between($postcode, 6, 10)) {

			Message::set(array('postcode' => 'Postcode must be between 6 and 10 characters'), 'errors');

			$check = false;
		}
		if ($tel != '') {
			if (!is_numeric($tel)) {

				Message::set(array('tel' => 'Phone must be a number'), 'errors');

				$check = false;
			}
		}
		if ($url != '') {

			if (!filter_var($url, FILTER_VALIDATE_URL)) {

				Message::set(array('url' => 'Must be a valid URL'), 'errors');

				$check = false;
			}
		}
		if (!between($info, 8, 500)) {

			Message::set(array('info' => 'Info must be between 8 and 500 characters'), 'errors');

			$check = false;
		}

		return $check;
	}

	static public function uploadImage($file, $target_file, $imageFileType) {

		$check = getimagesize($file['tmp_name']);

		if (!$check) {

			Message::set(array('fileToUpload' => 'File is not an image.'), 'errors');

			return false;
		}

		if (file_exists($target_file)) {

			Message::set(array('fileToUpload' => 'File already exists.'), 'errors');

			return false;
		}

		if ($file['size'] > 500000) {

			Message::set(array('fileToUpload' => 'File is bigger than 500kb.'), 'errors');

			return false;
		}

		if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg') {

			Message::set(array('fileToUpload' => 'Wrong format. Only jpg, jpeg and png are supported.'), 'errors');

			return false;
		}

		return true;
	}



}

function between($value, $min, $max) {

	if (strlen($value) >= $min && strlen($value) <= $max) {

		return true;
	}

	return false;
}

function isUnique($value, $field, $table) {

	$sql = "SELECT * FROM $table WHERE $field = '$value'";
	$db = new Database;

	if($db->one($sql)) {

		return false;
	}

	return true;
}
