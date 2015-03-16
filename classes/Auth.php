<?php

class Auth {
	
	/**
	 * Function to attempt user login
	 *
	 * @param  array  $input
	 * 
	 * @return boolean
	 */
	static public function attempt($input) {

		$model = new User;

		$user = $model->checkLogin($input);

		if ($user) {

			// store user in $_SESSION variable
			$_SESSION['user'] = $user;

			return true;
		}

		return false;
	}

	/**
	 * Function to logout a user
	 *
	 * @param  array  $input
	 * 
	 * @return boolean
	 */
	static public function logout() {

		if (isset($_SESSION['user'])) {

			unset($_SESSION['user']);
		}
		
		return false;
	}

	/**
	 * Function to check if user is logged in
	 *
	 * @return boolean
	 */
	static public function check() {

		if (isset($_SESSION['user'])) {

			return true;
		}

		return false;
	}

	/**
	 * Function to return a logged in user
	 *
	 * @return mixed
	 */
	static public function user() {

		if (isset($_SESSION['user'])) {

			return $_SESSION['user'];
		}

		return false;
	}

	/**
	 * Function to check if logged in user is an admin
	 *
	 * @return boolean
	 */
	static public function is_admin() {

		if (isset($_SESSION['user'])) {

			return $_SESSION['user']->is_admin;
		}

		return false;
	}

}