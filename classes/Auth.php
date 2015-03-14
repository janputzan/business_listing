<?php

class Auth {
	
	static public function attempt($input) {

		$model = new User;

		$user = $model->checkLogin($input);

		if ($user) {

			$_SESSION['user'] = $user;

			return true;
		}

		return false;
	}

	static public function logout() {

		if (isset($_SESSION['user'])) {

			unset($_SESSION['user']);
		}
		
		return false;
	}

	static public function check() {

		if (isset($_SESSION['user'])) {

			return true;
		}

		return false;
	}

	static public function user() {

		if (isset($_SESSION['user'])) {

			return $_SESSION['user'];
		}

		return false;
	}

}