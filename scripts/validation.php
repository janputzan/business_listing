<?php

class Validation {

	static public function register($username, $password) {

		if ( ( strlen($username) >= 5 && strlen($username) <= 30 ) && ( strlen($password) > 5 && strlen($password) < 30 ) ) {

			return true;
		} 

		return false;
	}

}
