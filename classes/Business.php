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

		$name = $input['name'];
		$address_1 = $input['address_1'];
		$address_2 = $input['address_2'] ?: null;
		$city = $input['city'];
		$postcode = $input['postcode'];
		$tel = $input['tel'] ?: null;
		$url = $input['url'] ?: null;
		$info = $input['info'];
		$user_id = $settings['user_id'];
		$category_id = $settings['category_id'];
		$is_premium = $settings['is_premium'];
		$is_active = $settings['is_active'];

		$sql = "INSERT INTO $this->table (name, address_1, address_2, city, postcode, tel, url, info, user_id, category_id, is_premium, is_active) 
					VALUES ('$name', '$address_1', '$address_2', '$city', '$postcode', '$tel', '$url', '$info', '$user_id', '$category_id', '$is_premium', '$is_active') ";

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



}