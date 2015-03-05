<?php

require_once("database.php");

class User extends Database {

	private $table = 'users';
	
	public function __construct() {

		parent::__construct();
	}

	public function createNew() {

	}

	public function where($name, $value) {

		$sql = "SELECT * FROM $this->table WHERE $name = '$value'";
		
		$result = $this->runQuery($sql);

		return $result;
	}

	public function getAll() {

		$sql = "SELECT * FROM users";

		$result = $this->runQuery($sql);

		return $result;
	}
	
}