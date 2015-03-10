<?php

class Validation {

	static public function register($input) {

		if (!between($input['first_name'], 3, 30)) {

			return false;
		}
		if (!between($input['last_name'], 3, 30)) {

			return false;
		}
		if (!filter_var($input['email'], FILTER_VALIDATE_EMAIL)) {

			return false;
		}
		if (!isUnique($input['email'], 'email', 'users')) {

			return false;
		}
		if (!between($input['password'], 8, 30)) {

			return false;
		}

		return true;
	}

	static public function registerBusiness($input) {

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
