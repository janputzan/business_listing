<?php

	function getDatabase() {

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "jan_motors";

		try {
		    $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		}
		catch(PDOException $e){

		    echo "Connection failed: " . $e->getMessage();
		}
		
		return $db;
	}

	function checkLogin($db, $username, $password) {

		$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
		
		$query = $db->query($sql);
		
		$result = $query->fetch(PDO::FETCH_OBJ);
		
		if ($result) {
		
			return true;
		
		} 

		return false;
	}

	function register($db, $username, $password) {

		$sql = "INSERT INTO users(username, password) VALUES ('$username', '$password') ";


		try {
		
			$db->exec($sql);
		
		} catch(PDOException $e) {

		    return false;
  		}

		return true;
	}
?>