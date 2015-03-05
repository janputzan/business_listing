<?php

class Database {

	private $servername = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname = "business_listings";
	private $db;

	// constructor to call when an object is created
	public function __construct() {

		try {
		    $this->db = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
		    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		}
		catch(PDOException $e){

		    echo "Connection failed: " . $e->getMessage();
		}
		
	}

	public function __destruct() {

		$this->db = null;
	}

	public function runQuery($sql) {

		$query = $this->db->query($sql);
		
		$result = $query->fetchAll(PDO::FETCH_OBJ);

		return $result;
	}
	
	public function checkLogin($username, $password) {

		$sql = "SELECT * FROM users WHERE username = '$username'";
		
		$query = $this->db->query($sql);
		
		$result = $query->fetch(PDO::FETCH_OBJ);

		if ($result) {
			
			// compare password with the one stored in the database
			// return TRUE if matches, otherwise FALSE
			return password_verify($password,$result->password);
		}
		
		return false;
	}
	
	public function register($username, $password) {

		// hash password before storing it in the database
		$password = password_hash($password, PASSWORD_DEFAULT);

		$sql = "INSERT INTO users(username, password) VALUES ('$username', '$password') ";


		try {
		
			$this->db->exec($sql);
		
		} catch(PDOException $e) {

		    echo "Registration failed: " . $e->getMessage();
  		}

		return true;
	}
}



?>