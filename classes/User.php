<?php

class User extends Model{

	public function __construct() {

		parent::__construct();
	}

	
	/**
	 * Compare username and password
	 *
	 * @param  string  $username
	 * @param  string  $password
	 * 
	 * @return boolean
	 */

	public function checkLogin($input) {

		extract($input);

		$sql = "SELECT * FROM users WHERE email = '$email'";
		
		$user = $this->one($sql);

		if ($user) {

			// workaround for mayar server 
			// password_* methods are available with PHP 5 >= 5.6
			if (App::isLocal()) {
			
				return password_verify($password,$user->password);

			} else {

				return strcmp($user->password, crypt($password));
			}
		}
		
		return false;
	}

	/**
	 * Save user to database
	 *
	 * @param  string  $username
	 * @param  string  $password
	 * 
	 * @return boolean
	 */

	public function save($input) {

		// hash password before storing it in the database
		extract($input);

		// workaround for mayar server 
		// password_* methods are available with PHP 5 >= 5.6
		if (App::isLocal()) {
			
			$password = password_hash($password, PASSWORD_DEFAULT);

		} else {

			$password = crypt($password);
		}

		$sql = "INSERT INTO $this->table (first_name, last_name, email, password) VALUES ('$first_name', '$last_name', '$email', '$password')";

		if ($this->execute($sql)) {

			return true;
		}

		return false;
	}

	/**
	 * Changes password for user with a specific id
	 *
	 * @param  int  	$id
	 * @param  string  	$password
	 * 
	 * @return boolean
	 */

	public function changePassword($id, $password) {

		// workaround for mayar server 
		// password_* methods are available with PHP 5 >= 5.6
		if (App::isLocal()) {
			
			$password = password_hash($password, PASSWORD_DEFAULT);

		} else {

			$password = crypt($password);
		}

		$sql = "UPDATE $this->table SET password = '$password' WHERE id = '$id'";

		if ($this->execute($sql)) {

			return true;
		}

		return false;
	}

}