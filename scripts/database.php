<?php

/**
*
*	Class for connecting to database an running queries
*
*/
class Database {

	private $servername = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname = "business_listings";
	private $connection;

	// constructor to call when an object is created
	public function __construct() {

		try {
		    $this->connection = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
		    $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		}
		catch(PDOException $e){

		    echo "Connection failed: " . $e->getMessage();
		}
		
	}

	public function __destruct() {

		$this->connection = null;
	}

	/**
	 * Run a query and return one instance of result
	 *
	 * @param  string  $sql
	 * 
	 * @return PDO object
	 */

	public function one($sql) {

		$query = $this->connection->query($sql);
		
		$result = $query->fetch(PDO::FETCH_OBJ);

		return $result;
	}

	/**
	 * Run a query and return array of result
	 *
	 * @param  string  $sql
	 * 
	 * @return array of PDO objects
	 */

	public function all($sql) {

		$query = $this->connection->query($sql);
		
		$result = $query->fetchAll(PDO::FETCH_OBJ);

		return $result;
	}

	public function execute($sql) {

		try {
		
			$this->connection->exec($sql);
		
		} catch(PDOException $e) {

		    echo $e->getMessage();
		    
		    return false;
  		}

		return true;	
	}
	
	// public function register($username, $password) {

	// 	// hash password before storing it in the database
	// 	$password = password_hash($password, PASSWORD_DEFAULT);

	// 	$sql = "INSERT INTO users(username, password) VALUES ('$username', '$password') ";


	// 	try {
		
	// 		$this->connection->exec($sql);
		
	// 	} catch(PDOException $e) {

	// 	    echo "Registration failed: " . $e->getMessage();
 //  		}

	// 	return true;
	// }
}



?>