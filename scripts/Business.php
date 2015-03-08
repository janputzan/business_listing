<?php

require_once("Model.php");

class Business extends Model{

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

	
	/**
	 * Save business to database
	 *
	 * @param  string  	$name
	 * @param  string  	$address_1
	 * @param  string  	$address_2
	 * @param  string  	$city
	 * @param  string  	$postcode
	 * @param  string  	$tel
	 * @param  string 	$url
	 * @param  text 	$info
	 * @param  int  	$category_id
	 * @param  boolean  $is_premium
	 * @param  boolean  $is_active
	 * 
	 * @return boolean
	 */

	public function save($name, $address_1, $address_2 = null, $city, $postcode, $tel = null, $url = null, $info, $category_id, $is_premium, $is_active) {

		$sql = "INSERT INTO $this->table (name, address_1, address_2, city, postcode, tel, url, info, category_id, is_premium, is_active) 
					VALUES ('$name', '$address_1', '$address_2', '$city', '$postcode', '$tel', '$url', '$info', '$category_id', '$is_premium', $is_active) ";

		if ($this->execute($sql)) {

			return true;
		}

		return false;
	}

}