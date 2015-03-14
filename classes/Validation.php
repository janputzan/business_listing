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

			Message::set(array('name' => 'First Name must be between 3 and 30 characters long'), 'errors');

			$check = false;
		}
		if (!between($address_1, 3, 30)) {

			Message::set(array('address_1' => 'Last Name must be between 3 and 30 characters long'), 'errors');

			$check = false;
		}
		if (!filter_var($address_1, FILTER_VALIDATE_EMAIL)) {

			Message::set(array('address_1' => 'You email must be valid'), 'errors');

			$check = false;
		}
		if (!isUnique($city, 'email', 'users')) {

			Message::set(array('city' => 'This email is already in use, please log in'), 'errors');

			$check = false;
		}
		if (!between($postcode, 8, 30)) {

			Message::set(array('postcode' => 'Password must be between 8 and 30 characters'), 'errors');

			$check = false;
		}
		if (!between($tel, 8, 30)) {

			Message::set(array('tel' => 'Password must be between 8 and 30 characters'), 'errors');

			$check = false;
		}
		if (!between($url, 8, 30)) {

			Message::set(array('url' => 'Password must be between 8 and 30 characters'), 'errors');

			$check = false;
		}
		if (!between($info, 8, 30)) {

			Message::set(array('info' => 'Password must be between 8 and 30 characters'), 'errors');

			$check = false;
		}

		return $check;
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
