<?php

require_once("Model.php");

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

	public function checkLogin($username, $password) {

		$sql = "SELECT * FROM users WHERE username = '$username'";
		
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

	public function save($username, $password) {

		// hash password before storing it in the database
		$password = password_hash($password, PASSWORD_DEFAULT);
		$username = $username;

		$sql = "INSERT INTO $this->table (username, password) VALUES ('$username', '$password') ";

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