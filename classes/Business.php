<?php

class Business extends Model{

	public function __construct() {

		parent::__construct();
		$this->table = 'businesses';
	}

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
	 * @param  int  	$user_id
	 * @param  int  	$category_id
	 * @param  boolean  $is_premium
	 * @param  boolean  $is_active
	 * 
	 * @return boolean
	 */

	public function save($input, $settings) {

		extract($input);

		extract($settings);

		$sql = "INSERT INTO $this->table (name, address_1, address_2, city, postcode, tel, url, info, user_id, category_id, is_premium, is_active) 
					VALUES ('$name', '$address_1', '$address_2', '$city', '$postcode', '$tel', '$url', '$info', '$user_id', '$category_id', '$is_premium', '$is_active')";

		if ($this->execute($sql)) {

			return true;
		}

		return false;
	}

	/**
	 * Sets status of business active/inactive
	 *
	 * @param  int  	$id
	 * @param  boolean 	$status
	 * 
	 * @return boolean
	 */
	public function setActive($id, $status) {

		$sql = "UPDATE $this->table SET is_active = '$status' WHERE id = '$id'";

		if ($this->execute($sql)) {

			return true;
		}

		return false;
	}

	/**
	 * Gets all premium businesses
	 * @param bool $is_active = null
	 * 
	 * @return array of PDO objects
	 */
	public function getPremium($is_active = null) {

		if ($is_active) {

			$sql = "SELECT * FROM $this->table WHERE is_active = '1' AND is_premium = '1'";
		
		} else {

			$sql = "SELECT * FROM $this->table WHERE is_premium = '1'";
		}


		return $this->all($sql);
	}

	/**
	 * Counts available premium slots
	 * 
	 * @return int
	 */
	public function getAvailablePremiumCount() {

		return count($this->getPremium()) - 4;
	}

	/**
	 * Counts businesses in a category
	 * @param int $category_id
	 * 
	 * @return int
	 */
	public function countInCategory($category_id) {

		$sql = "SELECT COUNT(*) FROM $this->table WHERE category_id = '$category_id' AND is_active = '1'";

		return $this->getNumber($sql);
	}

	/**
	 * Find business by name
	 * @param string $name
	 * 
	 * @return PDO object
	 */
	public function findByName($name) {

		$sql = "SELECT * FROM $this->table WHERE name = '$name'";

		return $this->one($sql);
	}

}