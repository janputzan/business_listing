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
	 * @return mixed
	 */

	public function checkLogin($input) {

		extract($input);

		$sql = "SELECT * FROM $this->table WHERE email = '$email'";
		
		$user = $this->one($sql);

		if ($user) {

			// workaround for mayar server 
			// password_* methods are available with PHP 5 >= 5.6
			if (App::isLocal()) {
			
				// return PDO object if true
				if (password_verify($password,$user->password)) {

					return $user;
				}

			} else {

				// return PDO object if true
				if (strcmp($user->password, crypt($password))) {

					return $user;
				}
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

	/**
	 * Find user by email 
	 * @param string $email
	 * 
	 * @return PDO object
	 */
	public function findByEmail($email) {

		$sql = "SELECT * FROM $this->table WHERE email = '$email'";

		return $this->one($sql);
	}

}