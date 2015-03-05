<?php

require_once("database.php");

abstract class Model {

	protected $table;

	static public function getAll() {

		$db = new Database;

		$sql = "SELECT * FROM users";

		return $db->runQuery($sql);
	}
}

// class User extends Model {

// 	public function __construct() {

// 		parent::__construct('users');
// 	}
// }