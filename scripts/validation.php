<?php

class Validation {

	static public function register($username, $password) {

		if ( between($username, 3, 30) && between($password, 5, 30) ) {

			return true;
		} 

		return false;
	}



}

function between($value, $min, $max) {

	if (strlen($value) >= $min && strlen($value) <= $max) {

		return true;
	}

	return false;
}
