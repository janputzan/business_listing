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

		$email = $input['email'];
		$password = $input['password'];

		$sql = "SELECT * FROM users WHERE email = '$email'";
		
		$user = $this->one($sql);

		if ($user) {
			
			return password_verify($password,$user->password);
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
		$first_name = $input['first_name'];
		$last_name = $input['last_name'];
		$email = $input['email'];
		$password = password_hash($input['password'], PASSWORD_DEFAULT);

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

		$password = password_hash($password, PASSWORD_DEFAULT);

		$sql = "UPDATE $this->table SET password = '$password' WHERE id = '$id'";

		if ($this->execute($sql)) {

			return true;
		}

		return false;
	}

}