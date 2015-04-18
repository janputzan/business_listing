<?php

class Payment extends Model{

	public function __construct() {

		parent::__construct();
	}

	/**
	 * Save payment to database
	 *
	 * @param  array  $input
	 * 
	 * @return boolean
	 */

	public function save($input) {

		extract($input);

		$sql = "INSERT INTO $this->table (business_id, amount) VALUES ('$business_id', '$amount')";

		if ($this->execute($sql)) {

			return true;
		}

		return false;
	}

	/**
	 * Checks if business is paid
	 *
	 * @param  int  $business_id
	 * 
	 * @return boolean
	 */
	public function isPaid($business_id) {

		$sql = "SELECT * FROM $this->table WHERE business_id = '$business_id'";

		$payment = $this->one($sql);

		if ($payment) {

			return true;
		}

		return false;
	}
}